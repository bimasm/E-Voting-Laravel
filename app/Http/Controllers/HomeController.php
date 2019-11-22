<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon;
use App\Mahasiswa;
use App\Jurusan;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jurusan=Auth::guard('mahasiswa')->user()->id_jurusan;
        $data=Calon::where('id_jurusan', $jurusan)->where('status', 'active')->get();
        $belum=Mahasiswa::where('statuspilih', 'belum')->where('id_jurusan',$jurusan)->count();
        $namajurusan=Jurusan::where('id',$jurusan)->value('nama_jurusan');
        return view('home',compact('data','belum','namajurusan'));
    }
}
