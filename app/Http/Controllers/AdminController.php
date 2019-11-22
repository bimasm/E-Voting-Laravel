<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Panitia;
use App\Calon;
use App\Mahasiswa;
use App\History;


class AdminController extends Controller
{
    public function index()
    {
    	$jurusan=Jurusan::all()->count();
        $calon=Calon::all()->count();
        $mahasiswa=Mahasiswa::all()->count();
        return view('admin.home', compact('jurusan','calon','mahasiswa'));
    }
    //input data
    public function inputjurusan()
    {
        return view('admin.inputjurusan');
    }
    public function inputpanita()
    {
        $jurusan=Jurusan::all();
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
    public function history()
    {
        $data=History::all();
        return view('admin.data.history', compact('data'));
    }
    public function chart($id)
    {
        $data=Calon::where('id_jurusan', $id)->where('status', 'active')->get();
        $belum=Mahasiswa::where('statuspilih', 'belum')->count();
        $jurusan=Jurusan::where('id',$id)->value('nama_jurusan');
        return view('admin.chart', compact('data','belum','jurusan'));
    }
}
