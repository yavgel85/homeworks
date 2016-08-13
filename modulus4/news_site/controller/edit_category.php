<?php

class edit_category extends ACoreAdmin {
	
	public function get_content() {
        return $result = $this->m->get_edit_category();
	}
}
