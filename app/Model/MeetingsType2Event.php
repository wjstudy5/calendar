<?php
App::uses('AppModel', 'Model');
/**
 * MeetingsType2Event Model
 *
 */
class MeetingsType2Event extends AppModel {
	public function getNickname($meetingsId) {
		$events_rows = $this->find('all', array(
			'conditions' => array('MeetingsType2Event.meetings_id' => $meetingsId),
			'order'=>array('MeetingsType2Event.nickname'=>'DESC'),
			'fields'=>array('MeetingsType2Event.nickname')
			)) ;
		$nicknames = array();
		foreach($events_rows as $row) {
			$nickname = $row['MeetingsType2Event']['nickname'];
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
			'conditions' => array('MeetingsType2Event.meetings_id' => $meetingsId),
			'order'=>array('MeetingsType2Event.nickname'=>'DESC')
			)) ;
		$events = array();
		foreach($events_rows as $row) {
			$nickname = $row['MeetingsType2Event']['nickname'];
			if (!isset($events[$nickname])) {
				$events[$nickname] = array();
				array_push ($events[$nickname], $row['MeetingsType2Event']);
			} else {
				array_push ($events[$nickname], $row['MeetingsType2Event']);
			}
		}
		return $events;
	}
}
