<?php
declare(strict_types=1);

namespace App\Model\Entity;


use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $user_id
 * @property string $username
 * @property string $password
 */
class Tfeed extends Entity{
    protected $_accessible = [
        '*'=>true,
        
    ];
}