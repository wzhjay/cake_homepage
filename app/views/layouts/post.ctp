<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33667266-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
  <title>Zihao's homepage</title>
  <?php echo $html->css('style.css'); ?>
  <?php echo $html->css('/bootstrap/css/bootstrap.min.css'); ?>
  <?php echo $html->css('/bootstrap/css/bootstrap-responsive.min.css'); ?>
  <?php echo $javascript->link('jquery.min.js', true); ?>
  <?php echo $javascript->link('/bootstrap/js/bootstrap.js', true); ?>
  <?php echo $javascript->link('events.js', true); ?>
  <?php echo $javascript->link('/bootstrap/js/bootstrap.min.js', true); ?>
 </head>
 <body>
   <?php echo $this->element('header'); ?>

   <div class="page">
    <div class="errors">
     <?php 
      if($session->check('Message.flash')) $session->flash();
      if($session->check('Message.auth')) $session->flash('auth');
     ?>
    </div>
	  <div class="content">
		<?php echo $content_for_layout; ?>
	  </div>
	 <?php echo $this->element('recentposts'); ?>
	 <?php echo $this->element('scrollToTop'); ?>
   </div>
<!--  <div id="footer">
   <p>Copyright (c) 2010 CakePHP Blog</p>
  </div>-->
 </body>
</html>