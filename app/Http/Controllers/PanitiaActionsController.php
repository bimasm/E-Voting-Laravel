<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Calon;

class PanitiaActionsController extends Controller
{
    public function addcalon(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'fotohimpunan' => 'max:500000',
        ]);
    	$calon = new Jurusan();
        $calon->nama_jurusan=$request->nama;
        $file=$request->file('fotohimpunan');
        if (!$file) {
            return redirect()->route('in.jurusan')->with('alert','foto harus diisi!');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $calon->fotohimpunan='public/img/'.$file_name;
        $calon->status='disable';
        // dd($jurusan);
        $calon->save();
    	
        
        return redirect()->route('in.jurusan');
    }
    public function addpanitia(Request $request)
    {
        $panitia = new Panitia();
        $panitia->id_jurusan=$request->id_jurusan;
        $panitia->username=$request->username;
        $panitia->nama=$request->nama;
        $panitia->password=Hash::make($request->password);
        $panitia->status='disable';
        $panitia->save();
        return redirect()->route('in.panitia');

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
}
