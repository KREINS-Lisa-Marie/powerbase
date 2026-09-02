<?php

namespace App\Http\Controllers;

class WorkerContactController extends Controller
{
    public function index()
    {
       $company = auth()->user()->company;

       $title = __('general.worker_contact');

       return view('worker.contact', compact( 'company', 'title'));
    }
}
