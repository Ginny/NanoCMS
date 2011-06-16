<?php

use Nette\Object;

/**
 * Model base class.
 */
class PagesModel extends Object {

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
    
    public function getMenu() {
        return $this->database->table('pages')->fetchPairs('slug', 'title');
    }

}
