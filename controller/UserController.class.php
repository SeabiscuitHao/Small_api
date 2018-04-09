<?php
class UserController {
	public function Reg() {
		include "./view/user/reg.html";
	}

	public function doReg() {
		$user 		= $_POST['username'];
		$phone		= $_POST['phone'];
		$password	= $_POST['password'];

		$res = D('user') -> addUser($user,$phone,$password);

        if ($res) {
        	header('location:index.php?c=user&a=login');
        }
	}

	public function login() {
		include "./view/user/login.html";
	}

	public function doLogin() {
		$password = $_POST['password'];
		$phone	  = $_POST['phone'];
		
		$info = D('user') -> getUserInfoByPhone($phone);

		if ($info['password'] == $password) {
				echo "success";
			}else{
				echo "error 10001";
			}
		}
}