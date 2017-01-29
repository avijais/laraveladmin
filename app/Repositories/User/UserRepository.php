<?php
namespace App\Repositories\User;

use App\Repositories\User\UserInterface as UserInterface;
use App\User;

class UserRepository implements UserInterface
{
	public $user;

	function __construct(User $user)
	{
		$this->user = $user;	
	}

	public function createUser($userData)
	{
		$this->user->createUser($userData);	
	}

	public function getAll()
	{
		return $this->user->getAll();
	}

	public function userById($userData)
	{
		return $this->user->userById($userData->id);
	}

	public function userByEmail($userData)
	{
		return $this->user->userByEmail($userData->email);
	}

	public function userByMobile($userData)
	{
		return $this->user->userByMobile($userData->mobile);
	}

	public function update($userData)
	{
		return $this->user->updateUser($userData->id);
	}

	public function delete($userData)
	{
		return $this->user->deleteUser($userData->id);
	}

	public function registerUserRule(){
        return $this->user->registerUserRule();
    }

    public function loginUserRule(){
        return $this->user->loginUserRule();
    }
}