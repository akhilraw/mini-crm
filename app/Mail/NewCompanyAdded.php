<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewCompanyAdded extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $company;

    public function __construct($company)
    {
        //
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.SendMailWhenNewCompanyAdded')->subject('New Company arrived!')->with([
                'companyName' => $this->company->name,
                'companyEmail' => $this->company->email,
                'companyWebsite' => $this->company->website,
                'companyLogo' => $this->company->logo,
        ]);
    }
}
