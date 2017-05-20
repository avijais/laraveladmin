<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface as UserInterface;

class UserManagement extends Controller
{
    public function __construct(UserInterface $user){
    	$this->user = $user;
    }

    public function getAllUsers(){
    	$usersData = $this->user->getAll();
    	// echo "<pre>";print_r($usersData->toarray());die();
    	return view('admin.user.user-list')->with('usersData', json_encode($usersData));
    }
}
