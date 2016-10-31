<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

/*
 * static pages controller
 */
class PagesController extends Controller {
    // reset flags after page change
    protected function resetState() {
        return [
            'about' => false,
            'contact' => false,
            'home' => false
        ];
    }

    // about page 
    public function about() {
        $state = $this->resetState();
        $state['about'] = true;
        return view('pages.about')->withState($state);
    }
    
    // home page 
    public function home() {
        $state = $this->resetState();
        $state['home'] = true;
        return view('pages.home')->withState($state);
    }

    // contact page 
    public function contact() {
        $state = $this->resetState();
        $state['contact'] = true;
        return view('pages.contact')->withState($state);
    }
}