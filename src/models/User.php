<?php 

namespace Model;

use \Illuminate\Database\Eloquent\Model;

class User extends Model 
{
	protected $table = 'admins';

	public $timestamps = false;

	public function retrieveUsers()
	{
		return $this->all();
	}

	public function checkUser($email, $password) 
	{
		$user = $this->where('email', $email)->first();
		if (!password_verify($password, $user->password)) {
			return false;
		}
		return true;
	}

}