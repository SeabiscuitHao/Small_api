<?php
	function D($name) {
		static $res = array();
		if (empty($res[$name])) {
			$name = ucfirst($name);
			$classname = $name.'Model';
			include_once "./model/{$classname}.class.php";
			$model = new $classname();
			$res[$name] = $model;
		}
		return $res[$name];
	}
    function upLoadFile($name) {
        $path    = './public/uploads/';
        //拼文件名
        $filename = 'I'.time().rand(1,10).$_FILES[$name]['name'];
        $image = $path.$filename;

        //移动临时文件 到 指定的文件夹
        move_uploaded_file($_FILES[$name]['tmp_name'],$image);
        return $image;
    }