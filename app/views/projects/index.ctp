<h1 class="myheader">My Projects</h1>
<hr>
<div class="add-post">
  
<?php if ($this->Session->read('Auth.User')): ?>
<div class="alert alert-info"><i class="icon-plus"></i><?php echo $html->link(" Add Projects", array('action'=>'add')); ?></div>
<?php endif; ?>
  
</div>
<?php foreach ($projects as $project): ?>
<div class="one-post">
  <div class="post-title">
	<?php echo $html->link($project['Project']['title'], "/projects/view/".$project['Project']['id']); ?>
  </div>
  <div class="post-modified">
	<?php echo $project['Project']['modified']; ?>
  </div>
  <div class="post-content">
	<div class="alert alert-info">
	  <p><?php echo $project['Project']['body']?></p>
	</div>
  </div>
  <?php if ($this->Session->read('Auth.User')): ?>
  <div class="post-action">
	<?php echo $html->link('Delete', "/project/delete/{$post['Project']['id']}", null, 'Are you sure?') ?>
	<?php echo $html->link('Edit', '/project/edit/'.$project['Project']['id']);?>
  </div>
  <?php endif; ?>
</div>
<?php endforeach; ?>