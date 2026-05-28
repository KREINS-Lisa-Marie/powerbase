<?php

use App\Mail\OrderReminderMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


it("can create an order reminder mail", function (){

    $worker = User::factory()->create(['job'=>'worker']);

    $mail = new OrderReminderMail($worker);     //créer le mail

    expect($mail)->toBeInstanceOf(OrderReminderMail::class);        //Mail  = OrderReminderMail objet

});

it("has the correct content in an order reminder mail", function (){

    Mail::fake();

    $worker = User::factory()->create(['job'=>'worker']);

    $mail = new OrderReminderMail($worker);     //créer le mail

    $mail->assertSeeInOrderInHtml( ["Rappel", "14h00", "magasin"]);
});

it("sends an order reminder mail to the correct user", function (){

    Mail::fake();

    $worker = User::factory()->create(['job'=>'worker']);

    Mail::to($worker->email)->send(new OrderReminderMail($worker));

    $mail = Mail::sent(OrderReminderMail::class)->first();

    expect($mail->hasTo($worker->email))->toBeTrue();

});

it("sends a reminder email to all workers", function (){

    \Mail::fake();

    $workers = User::factory(5)->create(['job'=>'worker']);
    $admins = User::factory(5)->create(['job'=>'admin']);
    $storekeepers = User::factory(5)->create(['job'=>'storekeeper']);

    foreach ($workers as $worker){
        \Mail::to($worker->email)->send(new OrderReminderMail($worker));
    }

    Mail::assertSentCount(5);

});

it("doesn't send a reminder email to storekeepers and admins", function (){

    \Mail::fake();

    $admins = User::factory(5)->create(['job'=>'admin']);
    $storekeepers = User::factory(5)->create(['job'=>'storekeeper']);

    //tous ceux qui doivent recevoir des mails
    $workers = User::where('job', '=', 'worker')->get();

    foreach ($workers as $worker){
        \Mail::to($worker->email)->send(new OrderReminderMail($worker));
    }

    Mail::assertNotSent(OrderReminderMail::class);
    Mail::assertSentCount(0);
});
