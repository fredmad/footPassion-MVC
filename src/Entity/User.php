<?php 

namespace Entity;

use ludk\Utils\Serializer;

class User
{
    public $id;
    public $username;
    public $password;
    use Serializer;
}

?>