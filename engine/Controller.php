<?php
namespace Engine;
use \Engine\DI\DI;

abstract class Controller{
    protected $di;
    protected $db;
    protected $view;
    protected $config;
    protected $request;
    protected $load;

    public function __construct(DI $di)
    {
        $this->di      = $di;
        $this->db      = $this->di->get('db');
        $this->view    = $this->di->get('view');
        $this->config  = $this->di->get('config');
        $this->request = $this->di->get('request');
        $this->load    = $this->di->get('load');
    }

}