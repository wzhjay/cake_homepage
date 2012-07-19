<div class="one-post">
  <div class="post-title">
	<?php echo $html->link($project['Project']['title'], "/projects/view/".$project['Project']['id']); ?>
  </div>
  <div class="post-modified">
	<?php echo $project['Project']['modified']; ?>
  </div>
  <div class="post-content">
	<p class="project-sub-title">Description</p>
	<div class="alert alert-info">
	  <p><?php echo $project['Project']['description']?></p>
	</div>
	<p class="project-sub-title">Screenshot</p>
	<div class="project-big-pic">
	  <p><?php echo $html->image('screenshots/big/'.$project['Project']['image'], array('alt' => $project['Project']['title'])); ?><p>
	</div>
	<div class="project-link">
	  <p>Please click <?php echo $html->link("here", "http://".$project['Project']['link'], array(
		  'target' => '_blank'
	  )); ?> to view the project!</p> 
	</div>
  </div>
</div>