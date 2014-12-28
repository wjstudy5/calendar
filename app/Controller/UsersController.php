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
	}
	public function login() {
		$this->layout = "nolayout";
	}
}
