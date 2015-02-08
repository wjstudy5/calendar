<?php
class MeetingsPageController extends AppController {

	public $helper = array("Type3Calendar");

	public function index($type , $meetingsId) {
		$this->loadModel('MeetingsType1Event');
		$this->loadModel('MeetingsType2Event');
		$this->loadModel('MeetingsType3Event');
		$nicknames = array();
		$calendar = array();
		if ($type == 1) {
			$nicknames = $this->MeetingsType1Event->getNickname($meetingsId);
		} elseif ($type == 2) {
			$nicknames = $this->MeetingsType2Event->getNickname($meetingsId);
		} elseif ($type == 3) {
			$nicknames = $this->MeetingsType3Event->getNickname($meetingsId);
		} else {
			echo "error";
		}
		if ($type == 1) {
			$calendar = $this->MeetingsType1Event->getEvents($meetingsId);
		} elseif ($type == 2) {
			$calendar = $this->MeetingsType2Event->getEvents($meetingsId);
		} elseif ($type == 3) {
			$calendar = $this->MeetingsType3Event->getEvents($meetingsId);
		} else {
			echo "error";
		}
		$this->set('type',$type);
		$this->set('nicknames',$nicknames);
		$this->set('calendar',$calendar);
	}
}
?>