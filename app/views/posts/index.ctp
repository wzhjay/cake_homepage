<h1 class="myheader">Blog posts</h1>
<hr>
<div class="add-post">
  
<?if ($this->Session->read('Auth.User')): ?>
<div class="alert alert-info"><i class="icon-plus"></i><?php echo $html->link(" Add Post", array('action'=>'add')); ?></div>
<? endif; ?>
  
</div>
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