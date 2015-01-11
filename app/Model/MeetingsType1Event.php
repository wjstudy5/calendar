<?php
App::uses('AppModel', 'Model');
/**
 * MeetingsType1Event Model
 */
class MeetingsType1Event extends AppModel {
	public function getNickname($meetingsId) {
		$events_rows = $this->find('all', array(
			'conditions' => array('MeetingsType1Event.meetings_id' => $meetingsId),
			'order'=>array('MeetingsType1Event.nickname'=>'DESC'),
			'fields'=>array('MeetingsType1Event.nickname')
			)) ;
		$nicknames = array();
		foreach($events_rows as $row) {
			$nickname = $row['MeetingsType1Event']['nickname'];
			if (empty($nicknames)) {
				array_push ($nicknames, $nickname);
			}elseif (end($nicknames) != $nickname) {
				array_push ($nicknames, $nickname);
			}
		}
		return $nicknames;
	}
}
