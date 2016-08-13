<?php

class login extends ACore {

    protected function process_form(){
        $this->m->process_form_login();
    }

    public function get_content() {
        return true;
    }
}
