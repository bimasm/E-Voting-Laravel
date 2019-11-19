<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Jurusan;
use App\Panitia;
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
        $jurusan->status='disable';
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
            return redirect()->route('in.jurusan')->with('alert','foto harus diisi!');
        }
        $file_name=$file->getClientOriginalName();
        $path=public_path('/img');
        $file->move($path,$file_name);
        $jurusan->fotohimpunan='public/img/'.$file_name;
        $jurusan->status=$request->status;
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
}
