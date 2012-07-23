<?php

/*
 * posts controller
 */
App::import('Sanitize');
class SearchesController extends AppController
{
  var $helpers = array ('Html','Form', 'Javascript', 'Session');
  var $name = 'Searches';
  var $components = array('Session');
  var $uses = array('Post', 'Project'); // for search
  var $layout = 'search';
  
  function index()
  {
	
//	debug($this->params);
    if(!empty($this->params['form']['query'])) {
	  $postedQuery = $this->params['form']['query'];
	  $postedQuery = Sanitize::escape($postedQuery, 'default');
	  
	  $query_post = "SELECT * FROM posts as Post WHERE title LIKE '%".$postedQuery."%' OR body LIKE '%".$postedQuery."%' ORDER BY created DESC";
	  
	  $query_project = "SELECT * FROM projects as Project WHERE title LIKE '%".$postedQuery."%' OR description LIKE '%".$postedQuery."%' ORDER BY created DESC";
	  
	  $posts = $this->Post->query($query_post);
	  $projects = $this->Project->query($query_project);
//	  debug($posts);
	  
//	  $postedQuery = preg_replace('/^\s*{(\w+)}\s*=/', "", $postedQuery);
	  
	  foreach($posts as &$post) {
		// in link, cannot style
//		$post['Post']['title'] = preg_replace("/($postedQuery)/i", "<span class='search-highlight'>$1</span>", $post['Post']['title']);
		$post['Post']['body'] = preg_replace("/($postedQuery)/i", "<span class='search-highlight'>$1</span>", $post['Post']['body']);
	  }
	  unset($post); // break reference by the last element
	  
	  foreach($projects as &$project) {
		// in link, cannot style
//		$project['Project']['title'] = preg_replace("/($postedQuery)/i", "<span class='search-highlight'>$1</span>", $project['Project']['title']);
		$project['Project']['description'] = preg_replace("/($postedQuery)/i", "<span class='search-highlight'>$1</span>", $project['Project']['description']);
	  }
	  unset($project);
	  
	  $this->set('posts', $posts);
	  $this->set('projects', $projects);
    }
  }
}
?>
