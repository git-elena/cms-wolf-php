<?php

namespace Engine\Core\Database;
use \PDO;
use Engine\Core\Config\Config;

class Connection {
    private $link;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $config = Config::file('database');

        $dsn = 'mysql:host='.$config['host'].';dbname='.$config['db_name'];

        $this->link = new PDO($dsn, 'wolf', 'wolf');

        return $this;
    }

    public function execute($sql, $values = []) {
        $sth = $this->link->prepare($sql);
        
        return $sth->execute($values);
    }

    public function query($sql, $values = []) {
        $exe = $this->link->prepare($sql);
        $exe->execute($values);

        $result = $exe->fetchAll(PDO::FETCH_ASSOC);
        if ($result === false) {
            return [];
        }

        return $result;
    }
}
