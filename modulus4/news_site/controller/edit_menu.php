<?php

class edit_menu extends ACoreAdmin{

    public function get_content(){
        return $result = $this->m->get_edit_menu();
    }

}
