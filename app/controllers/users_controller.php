<?php

/*
 * users controller
 */

class UsersController extends AppController
{
  var $helpers = array ('Html','Form', 'Session');
  var $name = 'Users';
  var $components = array('Auth', 'Session');
  var $layout = 'login';
  
  function login()
  {
	
//	$this->Auth->password('sisahsajsnh');
	$this->set('error', false);
	
	if(!empty($this->data)){
	  $someone = $this->User->findByUsername($this->data['User']['username']);
	}
	
	if(!empty($someone['User']['username']) && $someone['User']['password']== $this->data['User']['password']){
	  $this->Session->write('User', $someone['User']);
	  
	  $this->Session->setFlash($someone['User']['username'].', Welcome back!!');
	  $this->redirect('/');
	}
  }
  
  function logout()
  {
	$this->Session->delete('Auth.User');
	$this->redirect('/');
  }
  
  function beforeFilter() {
	parent::beforeFilter();
	$this->Auth->allow('*');
  }
}
?>
