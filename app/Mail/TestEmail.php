<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        // 
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $address = 'referwithmeofficial@gmail.com';
        $subject = 'A friend referred you!';
        $name = 'Refer With Me';
        $referral_id = $this->data['referral_id'];
        $referral_link = "http://localhost:3000/refer={$referral_id}";

        return $this->view('email.test')
                    ->from($address, $name)
                    ->subject($subject)
                    ->with([ 'referral_link' => $referral_link ]);
    }
}
