<?php

namespace Admin\Controller;
use Engine\Controller;
use Engine\Core\Auth\Auth;

class AdminController extends Controller{
    
    protected $auth;

    public function __construct($di) {
        parent::__construct($di);

        $this->auth = new Auth();

        if ($this->auth->hashUser() == null){
            header('Location: /cms.wolf/admin/login/');
            exit;
        }
        //$this->checkAutorization();

        //print_r($_COOKIE);
/*
        if(isset($this->request->get['logout'])){
            $this->auth->unAuthorize();
        }
*/
    }

    public function checkAutorization(){       
        /*if($this->auth->hashUser() !== null){
            $this->auth->authorize($this->auth->hashUser());
        }

        if(!$this->auth->authorized() ){
            header('Location: /cms.wolf/admin/login/');
            exit;
        }*/
    }

    public function logout(){
        $this->auth->unAuthorize();
        header('Location: /cms.wolf/admin/login/');
        exit;
    }
}