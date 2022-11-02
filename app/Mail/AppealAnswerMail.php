<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AppealAnswerMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build(): AppealAnswerMail
    {
        return $this
            ->subject($this->data['answer'])
            ->attach($this->data['answer_file']->getRealPath(), [
                'as' => $this->data['answer_file']->getClientOriginalName()
            ])
            ->markdown('admin.applications.email');
    }
}
