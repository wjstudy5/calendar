<?php
App::uses('AppModel', 'Model');
/**
 * MeetingsType3Event Model
 *
 */

function array_msort($array, $cols)
{
    $colarr = array();
    foreach ($cols as $col => $order) {
        $colarr[$col] = array();
        foreach ($array as $k => $row) { $colarr[$col]['_'.$k] = strtolower($row[$col]); }
    }
    $eval = 'array_multisort(';
    foreach ($cols as $col => $order) {
        $eval .= '$colarr[\''.$col.'\'],'.$order.',';
    }
    $eval = substr($eval,0,-1).');';
    eval($eval);
    $ret = array();
    foreach ($colarr as $col => $arr) {
        foreach ($arr as $k => $v) {
            $k = substr($k,1);
            if (!isset($ret[$k])) $ret[$k] = $array[$k];
            $ret[$k][$col] = $array[$k][$col];
        }
    }
    return $ret;

}

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
			'order'=>array('MeetingsType3Event.nickname ASC','MeetingsType3Event.time ASC')
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
