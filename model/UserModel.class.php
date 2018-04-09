<?php
class UserModel {
	public function addUser($user,$phone,$password) {
		$mysqli = new mysqli('localhost','root','root','zt_test');
        $sql = "insert into zt_user (name,phone,password) value ('{$user}', '{$phone}', '{$password}')";
        $query = $mysqli -> query($sql);
        return $query;
	}

	public function getUserInfoByPhone($phone) {
		$mysqli = new mysqli('localhost','root','root','zt_test');
		$sql = "select * from zt_user where phone = {$phone}";
		$query = $mysqli -> query($sql);
		$info = $query -> fetch_array(MYSQLI_ASSOC);
		return $info;
	}
}