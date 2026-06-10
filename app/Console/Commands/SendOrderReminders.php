<?php

namespace App\Console\Commands;

use App\Mail\OrderReminderMail;
use App\Models\User;
use Illuminate\Console\Command;



class SendOrderReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:send-order-reminders';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a reminder email to all workers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $workers = User::where('job', '=', 'worker')->get();

        foreach ($workers as $worker){
            //pour chaque worker on envoie un email à son adresse mail via OrderReminderMail
            \Mail::to($worker->email)->send(new  OrderReminderMail($worker));
            //tester si ça envoie à la personne
            dump("Reminder sent to {$worker->email}");
        }
        //tester si ça envoie à chacun
        dump("Reminders sent to every worker");
    }
}

//pas dd parce que sinon die! je ne veux pas que ça die. donc juste dump
