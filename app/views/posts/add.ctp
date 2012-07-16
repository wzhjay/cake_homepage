<h1 class="myheader">Add Post</h1>
<div class="add-edit-post-form">
<?php
  echo $this->Form->create('Post', array('action' => 'add'));
  echo $this->Form->input('title', array(
	  'placeholder' => "What's new",
		'type' => "text",
		'class' => "input"
  ));
  echo $this->Form->input('body', array(
	  'rows' => '5',
	  'column' => '10',
	  'type' => "text",
	  'class' => "input"
	  ));
?>
  
  <div id="save-post-btn">
  <?php
	echo $this->Form->submit('Save Post', array('class' => 'btn'));
  ?>
  </div>
</div>