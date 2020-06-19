<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\DripEmailer;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    //protected $signature = 'email:send {user}';
    //protected $signature =email:send {user*};
    //php artisan email:send foo bar

     protected $signature = 'email:send {user} {--id=*}';
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
     *
     * @return mixed
     */
    public function handle(DripEmailer $drip)
    {
        $drip->send(User::find($this->argument('user')));
    }
}
