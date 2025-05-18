<?php
namespace App\Mail;
use App\Models\Rental;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RentalConfirmationMail extends Mailable{
    use Queueable, SerializesModels;
    public $rental;

    public function __construct(Rental $rental){
        $this->rental = $rental;
    }

    public function build(){
        return $this->subject('Your Car Rental Confirmation')
                    ->markdown('emails.rental.confirmation');
    }
}
