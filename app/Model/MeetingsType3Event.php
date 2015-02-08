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
			'order'=>array('MeetingsType3Event.nickname'=>'DESC'),
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
		$events_rows = $this->find('all', array(
			'conditions' => array('MeetingsType3Event.meetings_id' => $meetingsId),
			'order'=>array('MeetingsType3Event.nickname'=>'DESC')
			)) ;
		$events = array();
		foreach($events_rows as $row) {
			$nickname = $row['MeetingsType3Event']['nickname'];
			if (!isset($events[$nickname])) {
				$events[$nickname] = array();
				array_push ($events[$nickname], $row['MeetingsType3Event']);
			} else {
				array_push ($events[$nickname], $row['MeetingsType3Event']);
			}
		}
		return $events;
	}
}
