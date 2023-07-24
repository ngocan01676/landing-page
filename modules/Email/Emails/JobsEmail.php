<?php

    namespace Modules\Email\Emails;

    use App\User;
    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Support\Facades\Storage;

    class JobsEmail extends Mailable
    {
        use Queueable, SerializesModels;
        private $data;
        private $fileInfo;

        public function __construct($data,$fileInfo)
        {
            $this->data = $data;
            $this->fileInfo = $fileInfo;
        }

        public function build()
        {
            $subject = 'Email from ravi';
            $temp = $this->fileInfo->data;
            $fileAttach =  Storage::disk('public')->path(str_replace("public/","",$this->fileInfo->data->path));
            $fileAttachName = $temp->name.".".$temp->file_extension;
            return $this->subject($subject)->view('Email::emails.jobs', $data = [
                'data'  => $this->data])->attach($fileAttach , [
                    'as' => $fileAttachName,
                    'mime' => $temp->file_type,
               ]);;
        }
    }
