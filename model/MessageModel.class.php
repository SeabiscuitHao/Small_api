<?php
class MessageModel {
	public $mysqli;
	public function __construct() {
		$this -> mysqli = new mysqli('localhost','root','root','zt_test');
	}
	public function addMessage($title,$author,$content,$image) {
		$sql = "insert into test_blog(title,author,content,img) values('$title','$author','$content','$image')";
		$query = $this -> mysqli -> query($sql);
		return $query;
	}

	public function lisMessage() {
		$sql = "select * from test_blog";
		$query = $this -> mysqli -> query($sql);
		return $query;
	}

	public function getInfoById($id) {
		$sql = "select * from test_blog where id = {$id}";
		$query = $this -> mysqli -> query($sql);
		$res = $query -> fetch_array(MYSQLI_ASSOC);
		return $res;
	}

	public function setInfo($author,$title,$content,$id) {
		$sql = "update test_blog set author = {$author},title = {$title},content = {$content} where id = {$id}";
		$query = $this -> mysqli -> query($sql);
		return $query;
	}

	// public function getInfo($id) {
	// 	$blogInfo = $this->getInfoById($id);
	// 	$info = $this->formatBlog($blogInfo);
	// 	return $info;
	// }

	public function formatBlog($value) {
		$item = array(
			"id" => $value['id'],
			"title" => $value['title'],
			"author" => $value['author'],
			"image" => $value['img'],
			"content" => $value['content'],
		);
		if (!empty($value['id'])) {
			$blog = D('message')->getInfoById($value['id']);

			$item['id'] = $blog['id'];
			$item['title'] = $blog['title'];
			$item['author'] = $blog['author'];
			$item['image'] = $blog['img'];
			$item['content'] = $blog['content'];
		} else {
			$item['id'] = 0;
			$item['id'] = '账号异常';
			$item['id'] = '';
		}
		return $item;
	}

	public function delInfo($id) {
		$sql = "delete from test_blog where id = {$id}";
		$query = $this -> mysqli -> query($sql);
		return $query;
	}

	public function getCount() {
		$sql = "select count(*) as num from test_blog";
		$query = $this -> mysqli -> query($sql);
		$res = $query -> fetch_array(MYSQLI_ASSOC);
		return $res['num'];
	}

	public function getList() {
		$sql = "select * from test_blog";
		$query = $this -> mysqli -> query($sql);
		$lists = $query -> fetch_all(MYSQLI_ASSOC);
		return $lists;
	}
}
