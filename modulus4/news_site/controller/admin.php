<?php

class admin extends ACoreAdmin{
    public function get_content(){
        return $result = $this->m->get_main_content();
    }
}
