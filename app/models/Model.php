<?php

use Nette\Object;

/**
 * Model base class.
 */
class Model extends Object {

    /** @var Nette\Database\Connection */
    public $database;

    public function __construct(Nette\Database\Connection $database) {
        $this->database = $database;
    }

    public function getPages() {
        return $this->database->table('pages');
    }

    public function getAuthenticatorService() {
        return new Authenticator($this->database->table('users'));
    }

    public function findBySlug($slug) {
        return $this->database->table('pages')->where("slug", $slug)->fetch();
    }

    public function findFirstPage() {
        return $this->database->table('pages')->get(1);
    }

}
