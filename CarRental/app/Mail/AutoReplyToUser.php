<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
class AutoReplyToUser extends Mailable{
    use Queueable, SerializesModels;
    public $data;
    public function __construct($data){
        $this->data = $data;
    }
    public function build(){
        return $this->subject('Thank you for contacting Car Rental')
                    ->view('emails.auto-reply');
    }
}
