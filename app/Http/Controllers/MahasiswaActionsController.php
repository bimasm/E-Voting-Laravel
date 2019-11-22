<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Calon;
use App\Mahasiswa;
use Auth;

class MahasiswaActionsController extends Controller
{
    public function pilih(Request $request)
    {
        $pilihan=Calon::find($request->id_calon);
        $jml=Calon::where('id', $request->id_calon)->value('suara');
        // dd($request);
        $pilihan->suara=$jml+1;
        $pilihan->save();
        $mhs=Mahasiswa::find($request->id);
        $mhs->statuspilih='sudah';
        $mhs->save();
        return redirect('/');
    }
}
