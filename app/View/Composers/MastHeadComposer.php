<?php

namespace App\View\Composers;
use Illuminate\View\View;

Class MastHeadComposer {

    public function compose(View $views){
        $mastHeadPhoto = null;
        if(request()->Routeis('home')){
            $mastHeadPhoto = 'images/home-bg.jpg';
        }
        if(request()->Routeis('home.about')){
            $mastHeadPhoto = 'images/about-bg.jpg';
        }
        if(request()->Routeis('home.contact')){
            $mastHeadPhoto = 'images/contact-bg.jpg';
        }
        $views->with('mastHeadPhoto', $mastHeadPhoto);
    }
}
