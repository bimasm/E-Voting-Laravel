<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\User;
use App\Timses;
use Auth;
class LoginController extends Controller
{
  public function getLogin()
  {
    return view('signin');
  }

  public function postLogin(Request $request)
  {
      
    $this->validate($request, [
      'username' => 'required',
      'password' => 'required'
    ]);
      
    if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
      return redirect()->intended('/admin/dashboard');
    } else if (Auth::guard('panitia')->attempt(['username' => $request->username, 'password' => $request->password])) {
      return redirect()->intended('/panitia/dashboard');
    } 
    return redirect('/login');
  }

  public function postLoginMhs(Request $request)
  {
    // dd($request);
      
    $this->validate($request, [
      'nim' => 'required',
      'password' => 'required'
    ]);
      
    if (Auth::guard('mahasiswa')->attempt(['nim' => $request->nim, 'password' => $request->password])) {
      return redirect()->intended('/dashboard');
    }
    return redirect('/');
  }

  public function logout()
  {
    if (Auth::guard('mahasiswa')->check()) {
      Auth::guard('mahasiswa')->logout();
    }
    return redirect('/');
  }
  public function signout()
  {
    if (Auth::guard('admin')->check()) {
      Auth::guard('admin')->logout();
    } else if (Auth::guard('panitia')->check()) {
      Auth::guard('panitia')->logout();
    }
    return redirect('/login');
  }
}