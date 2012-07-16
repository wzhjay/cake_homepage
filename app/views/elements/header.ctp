<!--  ----------------------------navbar -------------------------------------->
	<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <a class="brand" href="<?php echo $html->url('/'); ?>">Zihao Loves Komorebi</a>
		  <div class="nav-collapse in collapse" style="height: 626px; ">
			<ul class="nav">
			  <li><a href="<?php echo $html->url('/posts'); ?>"><i class="icon-file"></i> Posts</a></li>
			  <li><a href="<?php echo $html->url('/profilos'); ?>"><i class="icon-user"></i> Profilo</a></li>
			  <li><a href="<?php echo $html->url('/projects'); ?>"><i class="icon-wrench"></i> Projects</a></li>
			</ul>
<!--			<form class="navbar-search" action="">
			  <input type="text" class="search-query span2" placeholder="Search">
			</form>-->
			<ul class="nav pull-right">
			  <li class="divider-vertical"></li>
			  <?if (!$this->Session->read('Auth.User')): ?>
			  <li><a href="<?php echo $html->url('/users/login'); ?>"><i class="icon-eye-open"></i> Admin</a></li>
			  <? endif; ?>
			  <?if ($this->Session->read('Auth.User')): ?>
			  <li><a href="<?php echo $html->url('/users/logout'); ?>"><i class="icon-eye-open"></i> Logout</a></li>
			  <? endif; ?>
			  <li><a href="#"><i class="icon-download-alt"></i> Download CV</a></li>
			</ul>
		  </div><!-- /.nav-collapse -->
		</div>
	  </div><!-- /navbar-inner -->
	</div>
<!--  ----------------------------navbar -------------------------------------->