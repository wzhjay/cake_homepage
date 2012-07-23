<div class="sidebar">
  <h2 class="myheader">Recent Posts</h2>
  <div class="sidebar-content">
	<div class="alert alert-success">
	  <?php $posts = $this->requestAction('/posts/latest'); ?>
	  <?php foreach ($posts as $post): ?>
	  <div class="recent_post_title"><?php echo $this->Html->link($post['Post']['title'], array('action' => 'view', $post['Post']['id']));?></div>
	  <div class="recent_post_time"><?php echo $post['Post']['created']; ?></div>
	  <div class="recent_post_body"><?php echo $post['Post']['body'];?></div>
	  <?php endforeach; ?>
	</div>
  </div>
</div>