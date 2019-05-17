<?php

namespace App\Console\Commands;

use App\Mail\SendMail;
use App\Repositories\MailRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class EmailSendCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending Emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @param MailRepository $mailRepository
     * @return mixed
     */
    public function handle(MailRepository $mailRepository)
    {
        if($mailRepository->emails()->isNotEmpty()){

            foreach ($mailRepository->emails()->first() as $email){

                Mail::to($email->email)->queue(new SendMail($email));

            }

            $mailRepository->reCache();

        }
    }
}
