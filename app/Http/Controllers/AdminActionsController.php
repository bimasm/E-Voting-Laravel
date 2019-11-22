<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Jurusan;
use App\Panitia;
use App\Calon;
use App\Mahasiswa;
use Auth;
use Validator;

class AdminActionsController extends Controller
{
    public function addjurusan(Request $request)
    {
    	$validator = Validator::make($request->all(), [
            'fotohimpunan' => 'max:500000',
        ]);
    	$jurusan = new Jurusan();
        $jurusan->nama_jurusan=$request->nama;
        $file=$request->file('fotohimpunan');
        if (!$file) {
            return redirect()->route('in.jurusan')->with('alert','foto harus diisi!');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $jurusan->fotohimpunan='public/img/'.$file_name;
        // dd($jurusan);
        $jurusan->save();
    	
        
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
    public function editjurusan(Request $request)
    {
        $jurusan = Jurusan::find($request->id);
        $jurusan->nama_jurusan=$request->nama;
        $file=$request->file('fotohimpunan');
        if (!$file) {
            return redirect()->route('data.jurusan')->with('alert','foto harus diisi!');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $jurusan->fotohimpunan='public/img/'.$file_name;
        $jurusan->save();
        return redirect()->route('data.jurusan');
    }
    public function editpanitia(Request $request)
    {
        $panitia = Panitia::find($request->id);
       
        $panitia->username=$request->username;
        $panitia->nama=$request->nama;
        $panitia->password=Hash::make($request->password);
        $panitia->status=$request->status;
        // dd($panitia);
        $panitia->save();
        return redirect()->route('data.panitia');
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
            return redirect()->route('data.calon')->with('alert','foto harus diisi!');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $calon->foto='img/'.$file_name;
        // dd($calon);
        $calon->save();
        return redirect()->route('data.calon');
    }
    public function hapusjurusan($id)
    {
        $jrs= Jurusan::find($id);
        $jrs->delete();
        return redirect()->route('data.jurusan');
    }
    public function hapuspanitia($id)
    {
        $pnt= Panitia::find($id);
        $pnt->delete();
        return redirect()->route('data.panitia');
    }
    public function hapuscalon($id)
    {
        $pnt= Calon::find($id);
        $pnt->delete();
        return redirect()->route('data.calon');
    }
    public function hapusmahasiswa($id)
    {
        $pnt= Mahasiswa::find($id);
        $pnt->delete();
        return redirect()->route('data.mahasiswa');
    }
    public function reset($id)
    {
        $mhs=Mahasiswa::find($id);
        $mhs->statuspilih='belum';
        $mhs->visible='true';
        $mhs->save();
        return redirect()->route('data.mahasiswa');
    }
    public function statuspanitia($id)
    {
        $stat=Panitia::where('id', $id)->value('status');
        $pnt=Panitia::find($id);
        if ($stat=='active') {
            $pnt->status='disable';
        } else {
            $pnt->status='active';
        }
        
        $pnt->save();
        return redirect()->route('data.panitia');
    }
    
    
}
