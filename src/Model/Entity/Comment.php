<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class Comment extends Entity
{
    protected $_accessible = [
        'post_id' => true,
        'body' => true,
    ];
}
