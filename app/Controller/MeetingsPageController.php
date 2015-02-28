<?php
class MeetingsPageController extends AppController {

	public $helper = array("Type3Calendar");

	public function index($type = NULL , $meetingsId = NULL) {
		$this->loadModel('MeetingsType1Event');
		$this->loadModel('MeetingsType2Event');
		$this->loadModel('MeetingsType3Event');
		$nicknames = array();
		$calendar = array();
		if ($type > 0 && $type < 4 && isset($meetingsId)) {
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
			$this->set('meetingsId',$meetingsId);
			$this->set('nicknames',$nicknames);
			$this->set('calendar',$calendar);
		} else {
			header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found");
			include("notFound.php");
		}
	}

	public function update($type, $meetingsId) {
		$this->loadModel('MeetingsType1Event');
		$this->loadModel('MeetingsType2Event');
		$this->loadModel('MeetingsType3Event');

		$userName = $_POST['userName'];
		$data = $_POST['data'];
		$data = str_replace('\\', "", $data);
		$data = json_decode($data);

		if ($type == 3) {
			$this->MeetingsType3Event->calendarUpdate($meetingsId,$userName,$data->calendar);
		}
		$this->autoRender = false;
		$this->redirect('/meetingspage/index/'.$type."/".$meetingsId);
	}
}
?>