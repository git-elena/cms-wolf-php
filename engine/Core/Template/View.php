<?php

namespace Engine\Core\Template;
use Engine\Core\Template\Theme;

class View{
    protected $theme;

    public function __construct(){
        $this->theme = new Theme();
    }
    
    /**
     * Method render
     *
     * @param $template 
     * @param $vars = []
     * @throws \Exception
     */
    public function render($template, $vars = []){

        $templatePath = $this->getTemplatePath($template, ENV);
        
        if(!is_file($templatePath)){
            throw new \InvalidArgumentException(
                sprintf('Template "%s" not found in "%s"', $template, $templatePath)
            );       
        }
        
        $this->theme->setData($vars);
        extract($vars);

        ob_start();
        ob_implicit_flush(0);

        try{
            require $templatePath;
        }catch(\Exception $e){
            ob_end_clean();
            throw $e;
        }
        echo ob_get_clean();
    }

    public function getTemplatePath($template, $env = null){
        if($env == 'Cms'){
            return ROOT_DIR . '/content/themes/default/' . $template . '.php';
        }
        return ROOT_DIR . '/View/' . $template . '.php';
    }
}

