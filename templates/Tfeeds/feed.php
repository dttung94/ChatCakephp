<body>
    


<div>
<h2>Chat System</h2>
<?php



echo $this->Link->makeLink('Logout', '/users/logout');
?>
<?php
    $session = $this->request->getSession();
    echo $this->Form->create($tfeed, ['type' => 'file','data-emojiable'=>'true']);
    echo $this->Form->control('name',array('value'=>$session->read('User.name'),'readonly'=>'readonly')); 
    
    echo $this->Form->control('message',['type' => 'text','placeholder'=>'Input your message'],'[data-emojiable=true]');
    echo $this->Form->control('image_file',array('type'=>'file','value'=>'upload'));
    echo $this->Form->button(__('post'));
    echo $this->Form->end();
?>

<table style="width:100%">

    <tr>
        <td><h4>Name</h4></td>
        <td><h4>Message</h4></td>
        <td><h4>Created</h4></td>
        <td><h4>Modified</h4></td>
        <td><h4>Actions</h4></td>
    </tr>
    <?php if(isset($tfeeds)){ ?>
    <?php foreach ($tfeeds as $tfeed): ?>
    
    <tr>
        <td><?= h($tfeed['name']) ?></td>

        <td><?= h($tfeed['message']);?>
            <?php if ($tfeed['image_file']!= ''){?>
                <?php $session = $this->request->getSession();
                    if( $tfeed['type'] != 'video/mp4') {?>
                    <?=  $this->Html->image($tfeed->image_file, ['style' => 'max-width:150px;height:150px;border-radius:95%;'])?>
                <?php } else {?>
                   <?= $this->Html->media([$tfeed->image_file], ['tag' => 'video', 'autoplay', 'controls','style'=>'max-width:300px;height:300px;']) ?>
                <?php } ?>
            <?php } ?>             
        </td>
       
        
        <td><?= h($tfeed['created']);?></td>
        
        <td><?= h($tfeed['modified']); ?></td>
    
        <?php if ($session->read('User.user_id') == $tfeed['user_id']) { ?>
        <td><a href="/Tfeeds/delete/<?= h($tfeed['id']); ?>">Delete</a> 
        <span><a href="/Tfeeds/edit/<?= h($tfeed['id']); ?>">Edit</a></span></td>
    
        <?php } ?>
    </tr>
    <?php endforeach; ?>
    <?php } ?>
</table>
</div>


</body>


