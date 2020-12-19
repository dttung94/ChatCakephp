<h2>Login</h2>
<?php
echo $this->Form->create() /* array('type' => 'post',
    'id' => 'formLogin',
    'url' => array('controller' => 'users', 'action' => 'login'),
    'inputDefaults' => array(
        'class' => 'form-control',
        'format' => array('before', 'between', 'label', 'input', 'error', 'after'),
        'div' => array('class' => 'form-group'),
    ))
) */;
echo $this->Form->control('username');
echo $this->Form->control('password');
echo $this->Form->button(__('Login', array('class' => 'btn btn-primary')));
echo $this->Form->end();
echo $this->Link->makeLink('Register', '/users/register');
?>