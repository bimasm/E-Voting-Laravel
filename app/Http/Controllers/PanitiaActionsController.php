<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Calon;
use App\History;
use Validator;
use Auth;

class PanitiaActionsController extends Controller
{
    public function addcalon(Request $request)
    {
        $jurusan=Auth::guard('panitia')->user()->id_jurusan;
    	$validator = Validator::make($request->all(), [
            'fotohimpunan' => 'max:500000',
        ]);
    	$calon = new Calon();
        $calon->nama_ketua=$request->namak;
        $calon->nama_wakil=$request->namaw;
        $calon->deskripsi=$request->deskripsi;
        $file=$request->file('foto');
        if (!$file) {
            return redirect()->route('insert.calon')->with('alert','foto harus diisi!');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $calon->foto='img/'.$file_name;
        $calon->status='disable';
        $calon->visible='true';
        $calon->suara=0;
        $calon->id_jurusan=$jurusan;
        // dd($jurusan);
        $calon->save();
    	
        
        return redirect()->route('insert.calon');
    }
    public function addmahasiswa(Request $request)
    {
        $jurusan=Auth::guard('panitia')->user()->id_jurusan;
        $panitia=Auth::guard('panitia')->user()->id;
        $namapnt=Auth::guard('panitia')->user()->nama;
        $mhs = new Mahasiswa();
        $mhs->id_jurusan=$jurusan;
        $mhs->nim=$request->nim;
        $mhs->password=Hash::make('mhs');
        $mhs->id_panitia=$panitia;
        $mhs->statuspilih='belum';
        $mhs->status='disable';
        $mhs->visible='true';
        $mhs->save();
        $hs=new History();
        $hs->nama=$namapnt;
        $hs->aksi='create';
        $hs->kepada=$request->nim;
        $hs->save();

        return redirect()->route('insert.mahasiswa');

    }
    public function activate($id)
    {
        $stat=Mahasiswa::where('id', $id)->value('status');
        $mhs=Mahasiswa::find($id);
        if ($stat=='active') {
            $mhs->status='disable';
        } else {
            $mhs->status='active';
        }
        
        $mhs->save();
        return redirect()->route('show.mahasiswa');
    }
    public function activatecalon($id)
    {
        $stat=Calon::where('id', $id)->value('status');
        $mhs=Calon::find($id);
        if ($stat=='active') {
            $mhs->status='disable';
        } else {
            $mhs->status='active';
        }
        
        $mhs->save();
        return redirect()->route('show.calon');
    }
    public function hapuscalon($id)
    {
        $pnt= Calon::find($id);
        $pnt->delete();
        return redirect()->route('show.calon');
    }
    public function editcalon(Request $request)
    {
        $calon = Calon::find($request->id);
        $calon->nama_ketua=$request->nama_ketua;
        $calon->nama_wakil=$request->nama_wakil;
        $calon->deskripsi=$request->deskripsi;
        $calon->status=$request->status;
        $file=$request->file('foto');
        if (!$file) {
            return redirect()->route('show.calon')->with('alert','foto harus diisi!');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $calon->foto='img/'.$file_name;
        // dd($calon);
        $calon->save();
        return redirect()->route('show.calon');
    }
    public function deletemhs($id)
    {
        $namapnt=Auth::guard('panitia')->user()->nama;
        $nim=Mahasiswa::where('id', $id)->value('nim');
        $mhs=Mahasiswa::find($id);
        $mhs->visible='false';
        $mhs->save();
        $hs=new History();
        $hs->nama=$namapnt;
        $hs->aksi='delete';
        $hs->kepada=$nim;
        $hs->save();
        return redirect()->route('show.mahasiswa');

    }
}
