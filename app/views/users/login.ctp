<?php if ($error): ?>
<p>The login credentials you supplied could not be recognized. Please try again.</p>
<?php endif; ?>

<h1 class="myheader">Login</h1>
<div id="login-form">
  <?php
	echo $this->Session->flash('auth');
	echo $this->Form->create('User', array('action'=>'login'));

	echo $this->Form->input('username', array(
		'label' => 'Username',
		'placeholder' => 'username',
		'type' => "text",
		'class' => "input"
		));
	echo $this->Form->input('password', array(
		'label' => 'Password',
		'type' => 'password',
		'class' => 'input',
		'placeholder' => 'Password'
		));
  ?>
  <div id="submit-btn">
  <?php
	echo $this->Form->submit('Login', array('class' => 'btn'));
  ?>
  </div>
</div>