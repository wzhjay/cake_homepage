<?php

/*
 * projects controller
 */

class ProjectsController extends AppController
{
  var $helpers = array ('Html','Form', 'Javascript');
  var $name = 'Projects';
  var $components = array('Session');
  
  function index()
  {
	$this->set('projects', $this->Project->find('all', array(
	  'order' => array('Project.modified DESC')
		)
	));
  }
  
  function view($id = null)
  {
	$this->Project->id = $id;
	$this->set('Project', $this->Project->read());
  }
  
  function add()
  {
	if(!empty($this->data)){
	  if($this->Project->save($this->data)){
		$this->Session->setFlash('Your project has been saved.');
		$this->redirect(array('action' => 'index'));
	  }
	}
  }
  
  function delete($id) {
	$this->Project->delete($id);
	$this->Session->setFlash('The project has been deleted.');
	$this->redirect(array('action'=>'index'));
  }
  
  function edit($id = null) {
	$this->Project->id = $id;
	if(empty($this->data)) {
	  $this->data = $this->Project->read();
	} 
	else {
	  if($this->Project->save($this->data)) {
		$this->Session->setFlash('Your project has been updated.');
		$this->redirect(array('action' => 'index'));
	  }    
	}
  }
  
}
?>
