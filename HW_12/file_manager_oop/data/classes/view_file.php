<?php

class view_file {
    private $path;
    private $content;
    static $_instance;

    static function get_instance($path = FALSE) {
        if (self::$_instance instanceof self) {
            return self::$_instance;
        }
        return self::$_instance = new self($path);
    }

    private function __construct($path) {
        $this->path = DIR_PATH . '/' . $path;
        $this->content = file_get_contents($this->path);
    }

    public function get_content_file() {
        $this->content = htmlentities($this->content, ENT_QUOTES, 'UTF-8');
        return $this->content;
    }
}
