<?php
class MessageController {
	public function add() {
		include "./view/message/add.html";
	}

	public function doAdd() {

		$image 	 = upLoadFile('img');
		$title 	 = $_POST['title'];
		$author  = $_POST['author'];
		$content = $_POST['content'];

		$query = D('message') -> addMessage($title,$author,$content,$image);
		if ($query) {
			header("location:index.php?c=message&a=lists");
		}else{
			echo "error 10002";
		}
	}

	public function lists() {

		//分页

		$limit = 3;
		$count = D('message') -> getCount();
		$pageCount = ceil($count / $limit);
		$page = !empty($_GET['p']) ? $_GET['p'] : 1;
		$offset = ($page-1) * $limit;

		$lists = D('message') -> getList();

		foreach ($lists as $key => $value) {
			$lists[$key] = D('message')-> formatBlog($value);
		}
		$result = array('error'=>0,'message'=>'','data'=>array());

		$result['data']['message'] = $lists;

		echo json_encode($result);die();
		// $query = D('message') -> lisMessage();
		// $res = $query -> fetch_all(MYSQLI_ASSOC);
		// include './view/message/lists.html';
	}

	public function edit() {
		$id = $_GET['id'];
		$res = D('message') -> getInfoById($id);
		include './view/message/edit.html';
	}

	public function doEdit() {
		$title 	 = $_POST['title'];
		$author  = $_POST['author'];
		$content = $_POST['content'];
		$id 	 = $_POST['id'];
		$query = D('message') -> setInfo($title,$author,$content,$id);
		if ($query) {
			// header("location:index.php?c=message&a=lists");
			echo "111";
		}else{
			echo "error 10003";
		}
	}

	public function del() {
		$id = $_GET['id'];
		$query = D('message') -> delInfo($id);
		if ($query) {
			header("location:index.php?c=message&a=lists");
		}else{
			echo "error 10004";
		}
	}


}
