<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use App\Mail\PemberitahuanAkunDiblokir;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendBlokirEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $peminjaman;
    protected $imagePath;

    public function __construct($peminjaman, $imagePath)
    {
        $this->peminjaman = $peminjaman;
        $this->imagePath = $imagePath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->peminjaman->user->email)->send(new PemberitahuanAkunDiblokir($this->peminjaman, $this->imagePath));
    }
}
