<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon;
use App\Mahasiswa;
use App\Jurusan;
use Auth;
 
class PanitiaController extends Controller
{
    public function index()
    {
        $jurusan=Auth::guard('panitia')->user()->id_jurusan;
        $namajurusan=Jurusan::where('id',$jurusan)->value('nama_jurusan');
        $data=Calon::where('id_jurusan', $jurusan)->where('status', 'active')->get();
        $belum=Mahasiswa::where('statuspilih', 'belum')->where('id_jurusan',$jurusan)->count();
        return view('panitia.home',compact('data','belum','namajurusan'));
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
    	$data=Mahasiswa::where('id_jurusan', $jurusan)->where('visible', 'true')->get();
    	
        return view('panitia.data.mahasiswa',compact('data'));
    }
    public function inputcalon()
    {
        return view('panitia.inputcalon');
    }
    public function inputmahasiswa()
    {
        return view('panitia.inputmahasiswa');
    }
}
