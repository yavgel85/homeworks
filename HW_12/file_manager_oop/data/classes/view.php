<?php
class view extends abase {
	
	public function get_body() {
		if($_GET['path']) {
			$path = $_GET['path'];
			
			$file = view_file::get_instance($path);
			
			$result = array();
			
			$result['content'] = $file->get_content_file();
			$result['path'] = $path;
			$result['old_path'] = substr($path, 0, strrpos($path, '/'));

			return $result;
		}
	}
}
