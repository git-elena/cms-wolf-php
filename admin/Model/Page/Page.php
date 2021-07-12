<?php

namespace Admin\Model\Page;

use Engine\Core\Database\ActiveRecord;

class Page
{
    use ActiveRecord;

    protected $table = 'page';

    public $id;

    public $title;
    public $content;
    public $date;
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;

    }
 
    public function getContent()
    {
        return $this->content;
    }

 
    public function setContent($content)
    {
        $this->content = $content;

    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;

    }
}
