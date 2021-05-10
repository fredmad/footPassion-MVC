<?php 

namespace Entity;

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

    public function __construct($id, $title, $shortDesc, $longDesc, $urlImage, $urlLink, $createdAt, $userId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->shortDesc = $shortDesc;
        $this->longDesc = $longDesc;
        $this->urlImage = $urlImage;
        $this->urlLink = $urlLink;
        $this->createdAt = $createdAt;
        $this->userId = $userId;
    }
}

?>