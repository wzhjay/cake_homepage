<?php

/*
 * posts controller
 */

class PostsController extends AppController
{
  var $helpers = array ('Html','Form', 'Javascript');
  var $name = 'Posts';
  var $components = array('Session');
  
  function index()
  {
	$this->set('posts', $this->Post->find('all', array(
	  'order' => array('Post.modified DESC')
		)
	));
  }
  
  function view($id = null)
  {
	$this->Post->id = $id;
	$this->set('post', $this->Post->read());
  }
  
  function add()
  {
	if(!empty($this->data)){
	  if($this->Post->save($this->data)){
		$this->Session->setFlash('Your post has been saved.');
		$this->redirect(array('action' => 'index'));
	  }
	}
  }
  
  function delete($id) {
	$this->Post->delete($id);
	$this->Session->setFlash('The post has been deleted.');
	$this->redirect(array('action'=>'index'));
  }
  
  function edit($id = null) {
	$this->Post->id = $id;
	if(empty($this->data)) {
	  $this->data = $this->Post->read();
	} 
	else {
	  if($this->Post->save($this->data)) {
		$this->Session->setFlash('Your post has been updated.');
		$this->redirect(array('action' => 'index'));
	  }    
	}
  }

}
?>
