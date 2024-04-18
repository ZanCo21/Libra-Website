<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PemberitahuanAkunDiblokir extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $peminjaman;
    public $imagePath;

    public function __construct($peminjaman,$imagePath)
    {
        $this->peminjaman = $peminjaman;
        $this->imagePath = $imagePath;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pemberitahuan Akun Diblokir',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->view('mail.pemberitahuan-blokir')
        ->with([
            'imagePath' => $this->imagePath,
            'peminjam' => $this->peminjaman->user, 
        ]);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
