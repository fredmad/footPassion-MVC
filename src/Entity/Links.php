<?php 

namespace Entity;

use Entity\Users;
use ludk\Utils\Serializer;

class Links
{
    public $id;
    public $title;
    public $shortDesc;
    public $longDesc;
    public $urlImage;
    public $urlLink;
    public $createdAt;
    public Users $userId;
    use Serializer;
}

?>