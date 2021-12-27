<?php

namespace App\Jobs;

use Mail;
use App\Mail\MailNotify;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $mailReceiver;

    /**
     * Create a new job instance.
     *
     * @param $data
     */
    public function __construct($data, $mailReceiver)
    {
        $this->data = $data;
        $this->mailReceiver = $mailReceiver;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(){

        Mail::to($this->mailReceiver)->send(new MailNotify($this->data));
    }
}