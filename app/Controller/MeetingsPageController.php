<?php
class MeetingsPageController extends AppController {
	public function index($type , $meetingsId) {
		$this->loadModel('MeetingsType1Event');
		$nicknames = array();
		if ($type == 1) {
			$nicknames = $this->MeetingsType1Event->getNickname($meetingsId);
		}
		$this->set('nicknames',$nicknames);
	}
}
?>