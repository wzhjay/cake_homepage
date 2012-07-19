<?php

class AppController extends Controller {
  
  var $helpers = array('Html', 'Javascript', 'Session');
  var $components = array('Session');
  
  function checkSession() {
	if(!$this->Session->check('User')){
	  $this->redirect('/users/login');
	  exit();
	}
  }
  
  
}