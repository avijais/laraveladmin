<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface as UserInterface;

class UserController extends Controller
{
    public function __construct(UserInterface $user){
    	$this->user = $user;
    }

    public function usersList(){
    	$usersData = $this->user->getAll();
    	$pageTitle = "User List";
    	// echo "<pre>";print_r($usersData->toarray());die();
    	return view('admin.user.user-list')->with('data', json_encode($usersData));
    }
}
