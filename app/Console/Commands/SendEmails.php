<?php

namespace App\Console\Commands;

use App\User;
use App\DripEmailer;
use Illuminate\Console\Command;

//use Illuminate\Support\Facades\Mail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'email:send
                        {user : The ID of the user}';


    //protected $signature = 'email:send
    //                     {user : The ID of the user}
    //                     {--queue= : Whether the job should be queued}';


    //protected $signature = 'email:send {user}';
    //protected $signature =email:send {user*};
    //php artisan email:send foo bar

    //protected $signature = 'email:send {user} {--id=*}';
    //php artisan email:send --id=1 --id=2


    // Optional argument...
    //email:send {user?}

    // Optional argument with default value...
    //email:send {user=foo}

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send drip e-mails to a user';

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
     * The handle method will be called when your command is executed. You may place your command logic in this method.
     *
     * @return mixed
     */
    public function handle()
    {
        send(User::find($this->argument('user')));
    }

    // public function handle(DripEmailer $drip)
    // {
    //     $drip->send(User::find($this->argument('user')));
    // }
}
