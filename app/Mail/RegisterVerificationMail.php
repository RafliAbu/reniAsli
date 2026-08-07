<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RegisterVerificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public string $name;
    public string $code;

    public function __construct(string $name, string $code)
    {
        $this->name = $name;
        $this->code = $code;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Kode Verifikasi Registrasi Akun - Desa Balangka',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.register_verification',
        );
    }
}
