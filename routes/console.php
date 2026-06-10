<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use \Illuminate\Support\Facades\Schedule;

//ce fichier c'est pour la task schedule (https://laravel.com/docs/13.x/scheduling)

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

//ici je lui dis que chaque jour dans la semaine de travail, à 13h il doit envoyer le mail — donc il doit faire la commande que je lui dis
Schedule::command('mail:send-order-reminders')
    ->weekdays()
    ->dailyAt('13:00');
