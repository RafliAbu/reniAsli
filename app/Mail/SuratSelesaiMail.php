<?php

namespace App\Mail;

use App\Models\PengajuanSurat;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SuratSelesaiMail extends Mailable
{
    use Queueable, SerializesModels;

    public PengajuanSurat $pengajuan;

    public function __construct(PengajuanSurat $pengajuan)
    {
        $this->pengajuan = $pengajuan;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pengajuan Surat Anda telah Disetujui / Selesai - Desa Balangka',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.surat_selesai',
        );
    }
}
