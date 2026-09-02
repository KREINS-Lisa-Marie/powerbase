<?php

namespace App\Http\Controllers;

class PublicInfoController extends Controller
{
    public function index()
    {
        $title =__('general.homepage');

        return view('public.info', compact( 'title'));
    }
}
