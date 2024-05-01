<?php

namespace App\Jobs;

use App\Mail\PemberitahuanPayment;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendAfterPaymentEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    protected $user;
    protected $peminjaman;
    protected $imagePath;
    protected $reservedBooks;
    protected $email;
    public function __construct($user, $peminjaman, $imagePath, $reservedBooks, $email)
    {
        $this->user = $user;
        $this->peminjaman = $peminjaman;
        $this->imagePath = $imagePath;
        $this->reservedBooks = $reservedBooks;
        $this->email = $email;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new PemberitahuanPayment($this->user, $this->imagePath, $this->peminjaman, $this->reservedBooks));
    }

}
