<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
	/**
     * Destroy the given task.
     *
     * @postData  Array ( [_token] => sbTtIJenxDfkzAv0DY8zZX2v62kQ3v1GPZPSfQlv [email] => avinash152090@gmail.com [password] => 123456 [checkbox] => on ) 
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function login(){
    	// search in google =  'what is the puropse of creating repositories in laravel app folder'
    	//REPOSITORY PATTERN : http://itsolutionstuff.com/post/laravel-5-repository-pattern-tutorial-from-scratchexample.html
    	$postData = Input::get();
        print_r($postData);
        die();
        $response = [];
        // $response = ['status' => $status, 'message' => $msg, 'data' => $data];
        return redirect('admin/dashboard')->with('response', $response);
    }
}
