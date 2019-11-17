<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class AdminController extends Controller
{
    public function index()
    {
    	
        return view('admin.home');
    }
    public function inputjurusan()
    {
        return view('admin.inputjurusan');
    }
    public function inputpanita()
    {
        return view('admin.inputpanita');
    }
}
