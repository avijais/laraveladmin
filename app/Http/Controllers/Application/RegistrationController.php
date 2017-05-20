<?php

namespace App\Http\Controllers\Application;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use App\Repositories\User\UserInterface as UserInterface;

class RegistrationController extends Controller
{
	public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function registerUser(Request $request)
    {
	    
	    $status = $view = '';
	    $msg = $data = array();
		
		// The method method will return the HTTP verb for the request
		// $method = $request->method();
		
		if($request->isMethod('post'))
		{
	        // echo "<pre>";print_r($request);die();
	        $requestArray = $request->toarray();
	        $validation = Validator::make($requestArray, $this->user->registerUserRule());
	        if($validation->fails())
	        {
	        	$status = 'error';
	        	$view ='register.register';
	        	$messages = $validation->messages();
	        	foreach($messages->all() as $message)
	        	{
	        		$msg[] = $message;
	        	}
			}
			else
			{
				// unset($userData['confirm_password']);
				$requestArray['terms_condition'] = 1;
				$this->user->createUser($requestArray);
				// if(isset($insertedUserId) && is_int($insertedUserId) && $insertedUserId > 0)
				// {
					$msg = ['You have successfully registered :) ,'."<br>".'Please check your email and click on verification link (or copy url & paste into browser address bar) to complete your registration. !!'."<br>".'Thank You :-)'];
					$status = 'success';
					$view ='admin/login';
					$data = ['name' => $request->name];
					// sendemail	
				// }
				// else
				// {
				// 	$message = 'Hi ' . $request->name .','."<br>".'There are some problem with your network connection, Please try after sometime.'."<br>".' Thank You !! :( ';
				// 	$msg = array($message);
				// 	$status = 'error';
				// 	$view ='register';
				// 	$data = ['name' => $request->name];
				// }

			}
		}
	    else
	    {
	    	$msg = array('Attempt to access illegal OR Requested page not found.');
	    	$status = 'error';
	    	$view = 'error/404';
	    }
	    $response = array('status' => $status, 'message' => $msg, 'data' => $data);
	    return view($view)->with('response',json_encode($response));
    }
}
