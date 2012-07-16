<div class="one-post">
  <div class="post-title">
	<?php echo $html->link($post['Post']['title'], "/posts/view/".$post['Post']['id']); ?>
  </div>
  <div class="post-modified">
	<?php echo $post['Post']['modified']; ?>
  </div>
  <div class="post-content">
	<div class="alert alert-info">
	  <p><?php echo $post['Post']['body']?></p>
	</div>
  </div>
</div>