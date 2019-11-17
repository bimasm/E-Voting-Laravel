<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;



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
        $jurusan=Jurusan::where('status','disable')->get();
        return view('admin.inputpanita',compact('jurusan'));
    }
}
