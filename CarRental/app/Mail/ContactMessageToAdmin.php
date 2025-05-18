<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Queue\SerializesModels;

class ContactMessageToAdmin extends Mailable{
    use Queueable, SerializesModels;
    public $data;
    public function __construct($data){
        $this->data = $data;
    }
    public function build(){
        // Generate PDF from view
        $pdf = Pdf::loadView('emails.contact-pdf', ['data' => $this->data]);

        return $this->subject($this->data['subject'])
            ->view('emails.contact-admin-html')
            ->attachData($pdf->output(), 'Contact-Message.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
