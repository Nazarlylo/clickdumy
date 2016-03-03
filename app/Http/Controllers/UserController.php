<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

	public function editUsers ( $id ) {
		$user = User::find($id);
		return view('edituser', compact('user'));
	}
	public function update ( $id ) {
		$user = User::find($id);
		if(empty($_POST['password'])){
			$_POST['password'] =$user->password;
			}
		else {
			$_POST['password'] = bcrypt($_POST['password']);
		}
		$user->update($_POST);
		return redirect('/');
	}
}
