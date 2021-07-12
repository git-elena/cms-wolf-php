<?php

$this->router->add('home', '/cms.wolf/', 
'HomeController:index');
$this->router->add('news', '/cms.wolf/news', 
'HomeController:news');
$this->router->add('news_single', '/cms.wolf/news/(id:int)', 
'HomeController:news');