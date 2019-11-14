<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Auth;
class LoginController extends Controller
{
  public function getLogin()
  {
    return view('login');
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

  public function logout()
  {
    if (Auth::guard('admin')->check()) {
      Auth::guard('admin')->logout();
    } elseif (Auth::guard('panitia')->check()) {
      Auth::guard('panitia')->logout();
    }
    return redirect('/');
  }
}