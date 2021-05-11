<?php 

namespace Entity;

use ludk\Utils\Serializer;

class Users
{
    public $id;
    public $username;
    public $password;
    use Serializer;
}

?>