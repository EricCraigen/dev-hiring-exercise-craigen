<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class ExportReady extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.export-ready')->with([
            'user' => $this->user,
        ])
        ->attach(Storage::get('/storage/framework/laravel-excel/laravel-excel-ardoW741GZ4SxXHO1uguTo6r0IpgbI8E.csv'));

        $this->withSwiftMessage(function ($message) {
            $message->getHeaders()->addTextHeader(
                'export', 'Header Value'
            );
        });
    }
}
