<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Panitia;
use App\Calon;
use App\Mahasiswa;


class AdminController extends Controller
{
    public function index()
    {
    	
        return view('admin.home');
    }
    //input data
    public function inputjurusan()
    {
        return view('admin.inputjurusan');
    }
    public function inputpanita()
    {
        $jurusan=Jurusan::where('status','disable')->get();
        return view('admin.inputpanita',compact('jurusan'));
    }
    //show data
    public function datajurusan()
    {
        $data=Jurusan::all();
        return view('admin.data.jurusan', compact('data'));
    }
    public function datapanitia()
    {
        $data=Panitia::all();
        return view('admin.data.panitia', compact('data'));
    }
    public function datacalon()
    {
        $data=Calon::all();
        return view('admin.data.calon', compact('data'));
    }
    public function datamahasiswa()
    {
        $data=Mahasiswa::all();
        return view('admin.data.mahasiswa', compact('data'));
    }
}
