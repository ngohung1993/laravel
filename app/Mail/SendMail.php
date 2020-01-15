<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $pho;
    public $mail;
    public $mess;
    public $pro;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($full_name, $phone, $email, $product, $message)
    {
        $this->name = $full_name;
        $this->pho = $phone;
        $this->mail = $email;
        $this->mess = $message;
        $this->pro = $product;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_name = $this->name;
        $e_phone = $this->pho;
        $e_email = $this->mail;
        $e_message = $this->mess;
        $e_product = $this->pro;

        return $this->view('email.send-mail', compact("e_name", "e_phone", "e_email", "e_product", "e_message"))->subject('Tigerweb.vn');
    }
}
