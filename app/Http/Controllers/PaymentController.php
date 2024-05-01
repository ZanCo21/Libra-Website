<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Models\KoleksiPribadi;
use App\Jobs\SendAfterPaymentEmail;

class PaymentController extends Controller
{
    public function invoice($id)
    {
          
        if(auth()->check()) {
            $userId = auth()->user()->id;
            $wishlist = KoleksiPribadi::where('user_id', $userId)->get();
            $countwishlist = KoleksiPribadi::where('user_id', $userId)->count();
        }

        $reservedBooks = Peminjaman::with('user.anggota')->with('DetailPeminjaman')->findOrFail($id);

        if ($reservedBooks->denda->isNotEmpty()) {
            $totalhari = $reservedBooks->denda->filter(function ($item) {
                return $item->jumlah_denda != 0;
            })->count();
        } else {
            $totalhari = 1;
        }

        $totalbuku = $reservedBooks->DetailPeminjaman()->whereIn('status_peminjaman', ['overdue', 'lost'])->count();
        $dendaPerBuku = 5000;
        $hargaHilang = $reservedBooks->denda->sum('harga_hilang');
        $hitungDendaBukuPerhari = $totalbuku * $dendaPerBuku;
        $totalDendaBukuPerhari = $hitungDendaBukuPerhari;

        $totalJumlahDenda = $reservedBooks->denda->sum('jumlah_denda');
        $totalHargaHilang = $reservedBooks->denda->sum('harga_hilang');


        $lostItems = $reservedBooks->DetailPeminjaman()->whereIn('status_peminjaman', ['overdue', 'lost'])->exists();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        if ($lostItems) {
            $totalKeseluruhan = $totalJumlahDenda + $totalHargaHilang;
        } else {
            $totalKeseluruhan = 1000; // Atur nilai minimal yang diperbolehkan oleh Midtrans
        }        
        $params = array(
            'transaction_details' => array(
                'order_id' => $reservedBooks->order_id,
                'gross_amount' => $totalKeseluruhan,
            ),
            'customer_details' => array(
                'user_id' => $reservedBooks->user_id,
                'name' => $reservedBooks->user->anggota->nama_lengkap,
                'email' => $reservedBooks->user->email,
            ),
        );


        $snapToken = \Midtrans\Snap::getSnapToken($params);
        

        return view('admin.invoice', compact('reservedBooks', 'totalhari', 'totalbuku', 'totalDendaBukuPerhari', 'totalKeseluruhan', 'hargaHilang','snapToken','wishlist', 'countwishlist',));
    }

    public function sendEmailAfterPay($id)
    {
        $reservedBooks = Peminjaman::with('user.anggota')->with('DetailPeminjaman')->findOrFail($id);

        $totalJumlahDenda = $reservedBooks->denda->sum('jumlah_denda');
        $totalHargaHilang = $reservedBooks->denda->sum('harga_hilang');

        $peminjaman = $totalJumlahDenda + $totalHargaHilang;

        $user = $reservedBooks->user->userName;
        $email = $reservedBooks->user->email;

        $imagePath = public_path('assets/home/cdn/shop/t/9/assets/logo.png');

      

        return redirect()->back()->with(['success' => "Pembayaran Berhasil"],200);
    }

    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        $imagePath = public_path('assets/home/cdn/shop/t/9/assets/logo.png');

        // cek hash sudah sesuai dengan data signature key yg di kirim midtrabs
        if($hashed == $request->signature_key){
            if($request->transaction_status == 'capture')
            {
                $reservedBooks = Peminjaman::with('user.anggota')
                ->where('order_id', $request->order_id)
                ->firstOrFail();

                $user = $reservedBooks->user->userName;
                $totalJumlahDenda = $reservedBooks->denda->sum('jumlah_denda');
                $totalHargaHilang = $reservedBooks->denda->sum('harga_hilang');
                $peminjaman = $totalJumlahDenda + $totalHargaHilang;
                $email = $reservedBooks->user->email;

                $reservedBooks->user->update(['status' => 'active']);
                
                $detailPeminjamans = $reservedBooks->detailPeminjaman;
                if ($detailPeminjamans->count() === 1) {
                    // Jika hanya ada satu detail, langsung update status
                    $detailPeminjamans[0]->update(['status_peminjaman' => 'returned']);
                } elseif ($detailPeminjamans->count() > 1) {
                    // Jika ada lebih dari satu detail, lakukan iterasi
                    foreach ($detailPeminjamans as $item) {
                        $item->update(['status_peminjaman' => 'returned']);
                }
                }

                SendAfterPaymentEmail::dispatch($user, $imagePath, $peminjaman,$reservedBooks, $email)->onQueue('emails');
                // $order->update(['bank' => $request->bank]);
                // $order->update(['payment_type' => $request->payment_type]);
                // $order->update(['order_id' => $request->order_id]);
                // Mail::to($order->email)->send(new OrderEmail($order));
            }
        }
    }
}
