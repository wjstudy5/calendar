<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

	function validates_login($login_data) {
		// invalid login_data params
		if (!is_array($login_data) || !isset($login_data['User'])) {
			return null;
		}
		$email_input = isset($login_data['User']['email']) ? $login_data['User']['email'] : null;
		$password_input = isset($login_data['User']['password']) ? $login_data['User']['password'] : null;
		$user = $this->find('first', array(
			'conditions' => array('email' => $email_input, 'password' => $password_input)
		));
		return ($user ? $user['User']['id'] : null);
	}
}
