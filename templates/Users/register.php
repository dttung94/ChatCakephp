<h2>Register </h2>
<?php
echo $this->Form->create($user);
echo $this->Form->control('name',array('required'=>'required'));
echo $this->Form->control('username', array('required' => 'required'));
echo $this->Form->control('password', array('type' => 'password', 'required' => 'required'));
echo $this->Form->control('password_confirm', array('type' => 'password', 'required' => 'required', 'label' => 'Confirm password'));
echo $this->Form->button(__('Register', array('class' => 'btn btn-primary')));

echo $this->Form->end();
echo $this->Link->makeLink('Login', '/users/login');
?>