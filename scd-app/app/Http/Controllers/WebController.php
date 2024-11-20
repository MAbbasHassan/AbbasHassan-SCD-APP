<?php

namespace App\Http\Controllers; //ik namka function use kry dubara tu isi lye

use Illuminate\Http\Request; //multiple inheritance

class WebController extends Controller
{
    public function home()
    {
        return view('pages.home'); // . means folder nd the file 
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function order()
    {
        return view('pages.order');
    }

    public function grocery()
    {
        return view('pages.grocery');
    }

    public function skincare()
    {
        return view('pages.skincare');
    }

    public function cleaning()
    {
        return view('pages.cleaning');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function p_detail()
    {
        return view('pages.detail');
    }

    public function baby()
    {
        return view('pages.baby');
    }

    public function hygiene()
    {
        return view('pages.hygiene');
    }

    public function health()
    {
        return view('pages.health');
    }
}