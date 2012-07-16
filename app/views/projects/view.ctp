<div class="one-post">
  <div class="post-title">
	<?php echo $html->link($project['Project']['title'], "/projects/view/".$project['Project']['id']); ?>
  </div>
  <div class="post-modified">
	<?php echo $project['Project']['modified']; ?>
  </div>
  <div class="post-content">
	<div class="alert alert-info">
	  <p><?php echo $project['Project']['description']?></p>
	  <p><?php echo $project['Project']['image']?></p>
	  <p>Click <?php echo $html->link('here ', $project['Project']['link']); ?>to view the project</p>
	</div>
  </div>
</div>