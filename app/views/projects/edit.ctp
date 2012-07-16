<h1 class="myheader">Edit Project</h1>
<div class="add-edit-post-form">
<?php
  echo $this->Form->create('Project', array('action' => 'add'));
  echo $this->Form->input('title', array(
	  'placeholder' => "project name",
		'type' => "text",
		'class' => "input"
  ));
  
  echo $this->Form->input('description', array(
	  'rows' => '5',
	  'column' => '10',
	  'type' => "text",
	  'class' => "input"
  ));
  
  echo $this->Form->input('link', array(
	  'placeholder' => "project link",
		'type' => "text",
		'class' => "input"
  ));
  
  echo $this->Form->input('image', array(
	  'placeholder' => "upload image",
		'type' => "text",
		'class' => "input"
  ));
?>
  <div id="update-project-btn">
  <?php
	echo $this->Form->submit('Update', array('class' => 'btn'));
  ?>
  </div>
</div>