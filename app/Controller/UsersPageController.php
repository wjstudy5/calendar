<?php

class UsersPageController extends AppController {
	public function meetings() {

	}

	public function calendars() {
		$this->set("type", $_GET["type"]);
	}

	public function create_events() {

	}

	public function delete_events() {

	}

}

?>