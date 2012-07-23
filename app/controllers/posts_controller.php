<?php

/*
 * posts controller
 */

class PostsController extends AppController
{
  var $helpers = array ('Html','Form', 'Javascript', 'Session');
  var $name = 'Posts';
  var $components = array('Session');
  var $layout = 'post';
  
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
  
  function latest() {
	$posts = $this->Post->find('all', array('order' => 'Post.created DESC', 'limit' => 4));
	if (!empty($this->params['requested'])) {
	  return $posts;
	}
	else {
	  $this->set(compact('posts'));
	}
  }
//  
//  function search() {
//	$posts = $this->Post->find('all', array('order' => 'Post.created DESC'));
//	if (!empty($this->params['requested'])) {
//	  return $posts;
//	}
//	else {
//	  $this->set(compact('posts'));
//	}
//  }
  

}
?>
