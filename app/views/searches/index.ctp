


<h1 class="myheader">Search Results</h1>
<hr>
<h2 class="mysubheader">Posts</h2>
<?php foreach ($posts as $post): ?>
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
	<?if ($this->Session->read('Auth.User')): ?>
	<div class="post-action">
	  <?php echo $html->link('Delete', "/posts/delete/{$post['Post']['id']}", null, 'Are you sure?') ?>
	  <?php echo $html->link('Edit', '/posts/edit/'.$post['Post']['id']);?>
	</div>
  <? endif; ?>
</div>
<?php endforeach; ?>

<hr>

<h2 class="mysubheader">Projects</h2>
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
		<p><?php echo $project['Project']['description']?></p>
	  </div>
	</div>
	<?if ($this->Session->read('Auth.User')): ?>
	<div class="post-action">
	  <?php echo $html->link('Delete', "/projects/delete/{$project['Project']['id']}", null, 'Are you sure?') ?>
	  <?php echo $html->link('Edit', '/projects/edit/'.$project['Project']['id']);?>
	</div>
  <? endif; ?>
</div>
<?php endforeach; ?>



<!--<table class="table table-bordered table-striped">
    <tr>
        <th>Id</th>
        <th>Title</th>
		<th>Delete</th>
		<th>Edit</th>
        <th>Created</th>
    </tr>
 
    Here's where we loop through our $posts array, printing out post info 
 
    <?php foreach ($posts as $post): ?>
	  <tr>
        <td><?php echo $post['Post']['id']; ?></td>
        <td>
            <?php echo $html->link($post['Post']['title'], "/posts/view/".$post['Post']['id']); ?>
		</td>
		<td>
			<?php echo $html->link('Delete', "/posts/delete/{$post['Post']['id']}", null, 'Are you sure?') ?>
		</td>
		<td>
			<?php echo $html->link('Edit', '/posts/edit/'.$post['Post']['id']);?>
        </td>
        <td><?php echo $post['Post']['created']; ?></td>
    </tr>
    <?php endforeach; ?>
 
</table>-->