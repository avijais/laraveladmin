<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'terms_condition',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The function that are using to create new user
     *
     * @param $userData
     * @return $result
     */
    // public function create($userData)
    // {
    //     return static::insert();
    // }

    /**
     * The function that is using to create new user
     *
     * @return allUsers
     */
    public function getAll()
    {
        return static::all();
    }

    public function createUser($userData)
    {
        return static::create($userData);
    }

    public function userById($id)
    {
        return static::find($id);
    }

    public function userByEmail($email)
    {
        return static::where('email',$email)->first();
    }

    public function userByMobile($mobile)
    {
        return static::where('mobile',$mobile)->get();
    }

    public function updateUser($id)
    {
        return static::find($id)->update();
    }

    public function deleteUser($id)
    {
        return static::find($id)->delete();
    }

    public function registerUserRule(){
        return array(
                    'name' => array( 'required', 'alpha_dash' ),
                    /* 'mobile' => array( 'required', 'mobile' ), */
                    'email' => array( 'required', 'email' ),
                    'password' => array( 'required', 'alpha_dash' ),
                    // 'confirm_password' => array( 'required', 'password' ),
                    'terms_condition' => array('required')
                );
    }

    public function loginUserRule(){
        return array(
                    'email' => array( 'required', 'email' ),
                    'password' => array( 'required', 'alpha_dash' ),
                );
    }
}
