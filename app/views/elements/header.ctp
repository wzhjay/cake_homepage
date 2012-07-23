<!--  ----------------------------navbar -------------------------------------->
	<div class="navbar navbar-fixed-top">
	  <div class="navbar-inner">
		<div class="container">
		  <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="brand" href=<?php echo $html->url('/'); ?>>Zihao Loves Komorebi</a>
		  <div class="nav-collapse collapse">
			<ul class="nav">
			  <li><a href=<?php echo $html->url('/posts'); ?>><i class="icon-file" style="background-color:#999999"></i> Posts</a></li>
			  <li><a href=<?php echo $html->url('/profilos'); ?>><i class="icon-user" style="background-color:#999999"></i> Profilo</a></li>
			  <li><a href=<?php echo $html->url('/projects'); ?>><i class="icon-wrench" style="background-color:#999999"></i> Projects</a></li>
			</ul>
<!--			<form class="navbar-search" action="">
			  <input type="text" class="search-query span2" placeholder="Search">
			</form>-->
			<ul class="nav pull-right">
			  <li class="divider-vertical"></li>
			  <?php if (!$this->Session->read('Auth.User')): ?>
			  <li><a href=<?php echo $html->url('/users/login'); ?>><i class="icon-eye-open" style="background-color:#999999"></i> Admin</a></li>
			  <?php endif; ?>
			  <?php if ($this->Session->read('Auth.User')): ?>
			  <li><a href=<?php echo $html->url('/users/logout'); ?>><i class="icon-eye-open" style="background-color:#999999"></i> Logout</a></li>
			  <?php endif; ?>
			  <li><a href='download.php'><i class="icon-download-alt" style="background-color:#999999"></i> Download CV</a></li>
			</ul>
		  </div><!-- /.nav-collapse -->
		</div>
	  </div><!-- /navbar-inner -->
	</div>
<!--  ----------------------------navbar -------------------------------------->