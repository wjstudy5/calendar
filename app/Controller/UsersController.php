<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function index() {
		
	}
	public function add() {
		$this->layout = "only_title";
	}
	public function validates_email() {
		$this->layout = "nolayout";
		$email_input = isset($this->params->query['email']) ? $this->params->query['email']: null;
		$this->set('email', $email_input);
		if ($email_input) {
			$user = $this->User->find('first', array(
				'conditions' => array('email' => $email_input)
			));
			$user ? $this->set('status', 'failure') : $this->set('status', 'success');
		} else {
			$this->set('status', '');
		}
	}
	public function login() {
		$this->layout = "nolayout";
		if ($this->request->is('post')) {
			$user = $this->User->validates_login($this->request->data);
			$this->set('status', 'success');
		}
	}
	public function create() {
		$this->layout = "nolayout";
		if($this->request->is('post')) {
			if ($this->User->save($this->request->data)) {
				$this->redirect('/');
			}
		} else {
			$this->redirect('./add');
		}
	}
	public function mypage() {
	}
}
