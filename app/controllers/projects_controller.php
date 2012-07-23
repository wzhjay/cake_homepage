<?php

/*
 * projects controller
 */

class ProjectsController extends AppController
{
  var $helpers = array ('Html','Form', 'Javascript', 'Session');
  var $name = 'Projects';
  var $components = array('Session', 'Image');
  var $layout = 'project';
  
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
	$this->set('project', $this->Project->read());
  }
  
  function add()
  {
	if(!empty($this->data)){
	  $this->data['Project']['image'] = $this->Image->upload_image_and_thumbnail($this->data, 'image', '560x400', 250, 'screenshots', true);
	  if($this->Project->save($this->data)){
		$this->Session->setFlash('Your project has been saved.');
		$this->redirect(array('action' => 'index'));
	  }
	}
  }
  
  function delete($id) {
	$this->Project->id = $id;
	if(empty($this->data)) {
	  $this->data = $this->Project->read();
	} 
	$this->Project->delete($id);
	if(empty($this->data)) {
	  $this->data = $this->Project->read();
	} 
	$this->Image->delete_img($this->data['Project']['image'] ,"screenshots");
	$this->Session->setFlash('The project has been deleted.');
	$this->redirect(array('action'=>'index'));
  }
  
  function edit($id = null) {
	
	$this->Project->id = $id;
	if(empty($this->data)) {
	  $this->data = $this->Project->read();
	} 
	else {
	  
	  if($this->data['Image']['image']['error'] == 0) {
		$this->data['Project']['image'] = $this->Image->upload_image_and_thumbnail($this->data, 'image', '560x400', 250, 'screenshots', true);
	  }

	  if($this->Project->save($this->data)) {
		$this->Session->setFlash('Your project has been updated.');
		$this->redirect(array('action' => 'index'));
	  }    
	}
  }
  
//  function search() {
//	$projects = $this->Project->find('all', array('order' => 'Project.created DESC'));
//	if (!empty($this->params['requested'])) {
//	  return $projects;
//	}
//	else {
//	  $this->set(compact('projects'));
//	}
//  }
//  
}
?>
