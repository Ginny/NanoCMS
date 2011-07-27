<?php

namespace Model;

use Nette\Object;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersModel
 *
 * @author droid
 */
class UsersModel extends Object {

    /** @var Nette\Database\Connection */
    public $database;

    public function __construct($connection) {
        $this->database = $connection;
    }

    public function getAuthenticatorService() {
        return new \Authenticator($this->database->table('users'));
    }
}


