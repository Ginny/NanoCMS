<?php

namespace Model;

use Nette\Object;

/**
 * Model base class.
 */
class PagesModel extends Object {

    /** @var Nette\Database\Connection */
    public $database;

    public function __construct($database) {
        $this->database = $database;
    }

    public function getPages() {
        return $this->database->table('pages');
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

    public function countAllWithSlug($slug) {
        return $this->database->table('pages')->where("slug", $slug)->count();
    }

}
