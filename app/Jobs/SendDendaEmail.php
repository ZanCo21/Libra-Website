<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\PemberitahuanDenda;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendDendaEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $peminjaman;
    protected $denda;
    protected $imagePath;

    public function __construct($peminjaman, $denda, $imagePath)
    {
        $this->peminjaman = $peminjaman;
        $this->denda = $denda;
        $this->imagePath = $imagePath;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->peminjaman->user->email)->send(new PemberitahuanDenda($this->peminjaman,$this->denda, $this->imagePath));
    }
}
