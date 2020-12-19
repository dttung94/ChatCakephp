<div>
<h2>Chat System</h2>
<?php
echo $this->Link->makeLink('Logout', '/users/logout');
?>
<?php
$session = $this->request->getSession();
echo $this->Form->create($tfeed);
echo $this->Form->control('name',array('value'=>$session->read('User.name'),'readonly'=>'readonly'));
echo $this->Form->control('message',array('type' => 'text', 'required' => 'required'));
echo $this->Form->button(__('post'));
echo $this->Form->end();
?>