<?php
App::uses('AppModel', 'Model');
/**
 * MeetingsType3Event Model
 *
 */


class MeetingsType3Event extends AppModel {
	
	public function getNickname($meetingsId) {
		$events_rows = $this->find('all', array(
			'conditions' => array('MeetingsType3Event.meetings_id' => $meetingsId),
			'order'=>array('MeetingsType3Event.nickname'=>'ASC'),
			'fields'=>array('MeetingsType3Event.nickname')
			)) ;
		$nicknames = array();
		foreach($events_rows as $row) {
			$nickname = $row['MeetingsType3Event']['nickname'];
			if (empty($nicknames)) {
				array_push ($nicknames, $nickname);
			}elseif (end($nicknames) != $nickname) {
				array_push ($nicknames, $nickname);
			}
		}
		return $nicknames;
	}

	public function getEvents ($meetingsId) {
		
		$events = array();
		$events_rows = $this->find('all', array(
			'conditions' => array('MeetingsType3Event.meetings_id' => $meetingsId),
			'order'=>array('MeetingsType3Event.nickname ASC','MeetingsType3Event.time ASC','FIELD(MeetingsType3Event.day, "sun", "mon", "tue", "wed", "thu", "fri", "sat") ASC')
			)) ;
		foreach($events_rows as $row) {
			$nickname = $row['MeetingsType3Event']['nickname'];
			if (!isset($events[$nickname])) {
				$events[$nickname] = array();
				array_push ($events[$nickname], $row['MeetingsType3Event']);
			} else {
				array_push ($events[$nickname], $row['MeetingsType3Event']);
			}
		}
		foreach ($events as &$user) {
			foreach ($user as &$event) {
				$event['time'] = $this->changeTimeToFloat($event['time']);
			}
		}
		return $events;
	}
	
	public function calendarUpdate ($meetingsId,$userName,$data) {
		$condition = array('MeetingsType3Event.meetings_id' => $meetingsId, 'MeetingsType3Event.nickname' => $userName);
		$this->deleteAll($condition,false);
		foreach($data as &$event) {
			$event->time = $this->changeFloatToTime($event->time);
			$event->nickname = $userName;
			$event->meetings_id = $meetingsId;
		}
		$this->saveMany($data);
	}

	private function changeTimeToFloat ($time) {
		return  (float)str_replace(":",".",(str_replace("30", "50", $time)));
	}

	private function changeFloatToTime ($float) {
		$float = (float)$float;
		if ($float < 10) {
			if ($float > (int)$float) {
				return "0".(string)((int)$float).":30";
			} else {
				return "0".(string)$float.":00";
			}
		} else {
			if ($float > (int)$float) {
				return (string)((int)$float).":30";
			} else {
				return (string)$float.":00";
			}
		}
	}

}

