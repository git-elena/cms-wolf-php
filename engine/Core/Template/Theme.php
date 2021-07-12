<?php

namespace Engine\Core\Template;

class Theme{
    const RULES_NAME_FILE = [
        'header'  => 'header-%s',
        'footer'  => 'footer-%s',
        'sidebar' => 'sidebar-%s'
    ];

    public $url = '';
    protected $data = [];

	public function getData() {
		return $this->data;
	}
	
	/**
	 * @param array $data = []
	 */
	public function setData($data) {
		$this->data = $data;
	}

    /**
     * @param string $name = null
     */
    public function header($name = null){
        $name = (string) $name;
        $file = 'header';
        
        if($name !== ''){
            $file = sprintf(self::RULES_NAME_FILE['header'], $name);
        }
        $this->loadTemplateFile($file);
    } 

    /**
     * @param string $name = null
     */
    public function footer($name = ''){
        $name = (string) $name;
        $file = 'footer';
        
        if($name !== ''){
            $file = sprintf(self::RULES_NAME_FILE['footer'], $name);
        }
        $this->loadTemplateFile($file);
    }
        
    /**
     * @param string $name = ''
     */
    public function sidebar($name = ''){
        $name = (string) $name;
        $file = 'sidebar';
        
        if($name !== ''){
            $file = sprintf(self::RULES_NAME_FILE['sidebar'], $name);
        }
        $this->loadTemplateFile($file);
    } 
    
    /**
     * @param string $name = ''
     * @param array $data = []
     */
    public function block($name = '', $data = []){
        $name = (string) $name;
        
        if($name !== ''){
            $this->loadTemplateFile($name, $data);
        }
    }
    public function loadTemplateFile($nameFile, $data = [])
    {
        $templateFile = ROOT_DIR . '/content/themes/default/' . $nameFile . '.php';

        if (ENV == 'Admin') {
            $templateFile = ROOT_DIR . '/View/' . $nameFile . '.php';
        }
        
        if (is_file($templateFile)) {
            extract($data);
            require_once $templateFile;
        }else{
            throw new \Exception(sprintf('View file %s does not exist!', $templateFile));
        }
    }
}