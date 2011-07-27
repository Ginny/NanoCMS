<?php

use Nette\Database\Connection,
    Nette\DI\Container;

class ModelLoader {

    private $connection;

    public function __construct(Nette\Database\Connection $connection) {
        $this->connection = $connection;
    }

    public function loadModel($modelName) {
        $class = "Model\\" . $modelName;
        return new $class($this->connection);
    }

}

