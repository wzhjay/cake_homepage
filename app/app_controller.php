<?php

class AppController extends Controller {
  
  var $helpers = array('Html', 'Javascript', 'Session');
  
  function checkSession() {
	if(!$this->Session->check('User')){
	  $this->redirect('/users/login');
	  exit();
	}
  }
  
  
}