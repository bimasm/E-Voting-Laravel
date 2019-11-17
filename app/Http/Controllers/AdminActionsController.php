<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use Auth;
class AdminActionsController extends Controller
{
    public function addjurusan(Request $request)
    {
    	
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
}
