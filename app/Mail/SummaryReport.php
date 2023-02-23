<?php

namespace App\Mail;

use App\Models\ExpenseReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SummaryReport extends Mailable
{
    use Queueable, SerializesModels;

    private $expenseReport;

    /**
     * Create a new message instance.
     */
    public function __construct(ExpenseReport $expenseReport)
    {
        $this->expenseReport = $expenseReport;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Summary Report',
        );
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

    public function build()
    {
        return $this->view('mail.expenseReport', [
            'report' => $this->expenseReport
        ]);
    }
}
