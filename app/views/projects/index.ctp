<h1 class="myheader">My Projects</h1>
<hr>
<div class="add-project">
  
<?php if ($this->Session->read('Auth.User')): ?>
<div class="alert alert-info"><i class="icon-plus"></i><?php echo $html->link(" Add Projects", array('action'=>'add')); ?></div>
<?php endif; ?>
  
</div>
<div class="projects">  
<?php foreach ($projects as $project): ?>

<div class="hover panel">
  <div class="front">
	<div class="pad">
	<a href=""><?php echo $html->image('screenshots/small/'.$project['Project']['image'], array('alt' => $project['Project']['title'])); ?></a>
	</div>
  </div>
  <div class="back">
	<div class="pad">
	  <div class="project-title">
		<?php echo $html->link($project['Project']['title'], "/projects/view/".$project['Project']['id']); ?>
	  </div>
	  <div class="project-modified">
		<?php echo $project['Project']['modified']; ?>
	  </div>
	  <div class="project-link">
		<?php echo $html->link("Link to the project!", "http://".$project['Project']['link'], array(
			'target' => '_blank'
		)); ?>
	  </div>
	  <?php if ($this->Session->read('Auth.User')): ?>
	  <div class="project-actions">
		<?php echo $html->link('Delete', "/projects/delete/{$project['Project']['id']}", null, 'Are you sure?') ?>
		<?php echo $html->link('Edit', '/projects/edit/'.$project['Project']['id']);?>
	  </div>
	  <?php endif; ?>
	</div>
  </div>
</div>
													
<?php endforeach; ?>
</div>