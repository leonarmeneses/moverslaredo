<?php

namespace App\Mail;

use App\Models\Quote;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class QuoteEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $quote;

    /**
     * Create a new message instance.
     */
    public function __construct(Quote $quote)
    {
        $this->quote = $quote;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Your Moving Quote - MoversLaredo',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.quote',
            with: [
                'quote' => $this->quote,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        // Generate PDF
        $pdf = Pdf::loadView('pdfs.quote', ['quote' => $this->quote]);

        return [
            Attachment::fromData(
                fn () => $pdf->output(),
                'quote-' . $this->quote->id . '.pdf'
            )->withMime('application/pdf'),
        ];
    }
}
