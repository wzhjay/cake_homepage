<h1 class="myheader">Zihao's Profilo</h1>
<hr>
<div class="profilo-tabs">
  <div class="tabbable tabs-left">
	<ul class="nav nav-tabs">
	  <li class="pro-tab active"><a href="#lA" data-toggle="tab"><i class="icon-leaf"></i> Education</a></li>
	  <li class="pro-tab"><a href="#lB" data-toggle="tab"><i class="icon-calendar"></i> Activities</a></li>
	  <li class="pro-tab"><a href="#lC" data-toggle="tab"><i class="icon-list-alt"></i> Work Experiences</a></li>
	</ul>
	<div class="tab-content">
	  <div class="tab-pane active" id="1A">
		<?php echo $this->element('edu'); ?>
	  </div>
	  <div class="tab-pane" id="lB">
		<?php echo $this->element('activities'); ?>
	  </div>
	  <div class="tab-pane" id="lC">
		<?php echo $this->element('jobs'); ?>
	  </div>
	</div>
  </div>
</div>
