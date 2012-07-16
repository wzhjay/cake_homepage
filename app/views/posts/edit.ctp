<h1 class="myheader">Edit Post</h1>
<div class="add-edit-post-form">
<?php
  echo $form->create('Post', array('action' => 'edit'));
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
  echo $form->input('id', array('type'=>'hidden'));
?>

  <div id="update-post-btn">
  <?php
	echo $this->Form->submit('Update', array('class' => 'btn'));
  ?>
  </div>
</div>