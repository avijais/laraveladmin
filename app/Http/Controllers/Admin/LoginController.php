<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use App\Repositories\User\UserInterface as UserInterface;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

class LoginController extends Controller
{
    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }
    
    /**
     * The function that is using to login in system.
     *
     * @postData  Array ( [_token] => sbTtIJenxDfkzAv0DY8zZX2v62kQ3v1GPZPSfQlv [email] => avinash152090@gmail.com [password] => 123456 [checkbox] => on ) 
     * @param  Request  $request
     * @return Response
     */
    public function login(Request $request){
    	// search in google =  'what is the puropse of creating repositories in laravel app folder'
    	// REPOSITORY PATTERN : http://itsolutionstuff.com/post/laravel-5-repository-pattern-tutorial-from-scratchexample.html
    	// $postData = Input::get();
        $status = $view = '';
        $msg = $data = array();

        $requestArray = $request->toarray();
        $validation = Validator::make($requestArray, $this->user->loginUserRule());
        if($validation->fails())
        {
            $status = 'error';
            $view ='admin/login';
            $messages = $validation->messages();
            foreach($messages->all() as $message)
            {
                $msg[] = $message;
            }
        }
        else
        {
            $userData = $this->user->userByEmail($request);

            if(!empty($userData) && count($userData) > 0){
                if($userData->password === $request->password){
                    $userData->api_token = str_random(60);
                    $userData->save();
                    Session::set('userId', $userData->id);
                    // $userId = Session::get('userId');
                    $status = 'success';
                    $msg = ['Welcome!!'];
                    $data = array('name' => $userData->name, 'api_token' => $userData->api_token);
                    $view ='dashboard';
                    $response = array('status' => $status, 'message' => $msg, 'data' => $data);
                    $request->session()->put('response', json_encode($response));
                    return Redirect::route('admin/dashboard');
                }else{
                    $status = 'error';
                    $msg = ['You have entered wrong password'];
                    $view ='admin/login';
                    // $view ='admin_template';
                }    
            }else{
                $status = 'error';
                $msg = ['Email id you have entered is not associated with any account!!'];
                $view ='admin/login';
                // $view ='admin_template';
            }
        }
        $response = array('status' => $status, 'message' => $msg, 'data' => $data);
        
        return view($view)->with('response',json_encode($response));
    }


    /*
        Access data from database as Array format in laravel

        FETCH ARRAY TO ARRAYS IN LARAVEL

        DB::setFetchMode(PDO::FETCH_ASSOC);

        // then
        DB::table(..)->get(); // array of arrays instead of objects

        // of course to revert the fetch mode you need to set it again
        DB::setFetchMode(PDO::FETCH_CLASS);

    */

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    // public function dashboard(Request $request)
    // {
    //     $data=[];
    //     return view('dashboard');
    // }

    public function dashboard() {
        return view('dashboard');
    }

    public function logout(Request $request) {
        $response = array('status' => 'success', 'message' => 'Logout successfully!!', 'data' => array('api_token' => ''));
        $request->session()->put('response', json_encode($response));
        return Redirect::route('admin');
    }

    public function adminLogin() {
        return view('admin/login');
    }

}
