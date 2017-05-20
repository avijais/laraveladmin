<?php
namespace App\Repositories\User;

interface UserInterface{

	public function createUser($userData);

	public function getAll();

	public function userById($id);

	public function userByEmail($userData);

	public function userByMobile($mobile);

	public function update($id);

	public function delete($id);

	public function registerUserRule();

	public function loginUserRule();
}