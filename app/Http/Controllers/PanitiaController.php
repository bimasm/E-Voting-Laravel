<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon;
use App\Mahasiswa;
use Auth;

class PanitiaController extends Controller
{
    public function index()
    {
        return view('panitia.home');
    }
    public function datacalon()
    {
    	$jurusan=Auth::guard('panitia')->user()->id_jurusan;
    	$data=Calon::where('id_jurusan', $jurusan)->get();
    	// dd($data);
        return view('panitia.data.calon',compact('data'));
    }
    public function datamahasiswa()
    {
    	$jurusan=Auth::guard('panitia')->user()->id_jurusan;
    	$data=Mahasiswa::where('id_jurusan', $jurusan)->get();
    	
        return view('panitia.data.mahasiswa',compact('data'));
    }
}
