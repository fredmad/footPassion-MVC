<?php 

namespace Entity;

use Entity\User;
use ludk\Utils\Serializer;

class Link
{
    public $id;
    public $title;
    public $shortDesc;
    public $longDesc;
    public $urlImage;
    public $urlLink;
    public $createdAt;
    public User $userId;
    use Serializer;
}

?>