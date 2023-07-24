<?php

    namespace Modules\Email\Emails;

    use App\User;
    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;

    class SubscriberEmail extends Mailable
    {
        use Queueable, SerializesModels;
        private $data;

        public function __construct($data)
        {
            $this->data = $data;
        }

        public function build()
        {
            $subject = 'Email from ravi';
            return $this->subject($subject)->view('Email::emails.subscriber',$this->data);
        }
    }
