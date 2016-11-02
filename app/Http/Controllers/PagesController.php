<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/*
 * static pages controller
 */
class PagesController extends Controller {
    // home page 
    public function home() {
        return view('pages.home');
    }

    // about page 
    public function about() {
        return view('pages.about');
    }

    // contact page 
    public function contact() {
        return view('pages.contact');
    }
}