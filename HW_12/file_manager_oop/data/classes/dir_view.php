<?php

class dir_view {
	private $list_dirs; // объект класса DirectoryIterator
	private $path; // путь к папке, которую хотим просмотреть
	
	static $_instance;

	// синглтон
	// формируем массив данных(массив вложенных файдов и папок) по запрашиваемой папке
	static function get_instance($path = FALSE) {
		if(self::$_instance instanceof self) {
			return self::$_instance;
		}
		return self::$_instance = new self($path);
	}
	
	private function __construct($path) {
		if($path) {
			$this->path = $path.'/';
			$path = '/'.$path;  //  /data
		}
		$this->list_dirs = new DirectoryIterator(DIR_PATH.$path);
		return $this->list_dirs;
	}

	// формируем массив данных по запрашиваемой папке
	public function dirs_to_array() {
		$arr = array();
		$i = 0;

		foreach($this->list_dirs as $res) {
			// если текущий элемент не является "." или ".."
			if(!$res->isDot()) {
				//$file_name = iconv('','UTF-8',$res->getFilename()); // если имена папок и/или файлов на кирилице
				$file_name = $res->getFilename();

				// является ли текущий элемент папкой
				if($res->isDir()) {
					$arr['dirs'][$i][$file_name] = $this->path.$file_name;
				}
				// если элемент не папка - значит он файл
				else {
					// получаем расширение текущего файла
					$ext = $res->getExtension();

					$arr['files'][$i][$file_name]['size'] = $res->getSize();

					// php, html, htm, css, js, txt - валидные расширения
					$patern_file = "/^(?:php|html?|css|js|txt)$/i";

					// изображения: gif, jpg, png, bmp, tiff, ico
					$patern_img = "/^(?:gif|jpe?g|png|bmp|tiff?|ico)$/i";

					if (preg_match($patern_file, $ext)){
						$arr['files'][$i][$file_name]['type'] = 'text';
					}
					elseif(preg_match($patern_img, $ext)) {
						$arr['files'][$i][$file_name]['type'] = 'img';
					}
				}
				$i++;
			}
		}
		// переход на уровень выше
		$arr['old_path'] = substr($this->path,0,strrpos($this->path,'/',-2));

		// текущий путь к папке/файлу
		$arr['path'] = $this->path;
		
		return $arr;
	}
}
