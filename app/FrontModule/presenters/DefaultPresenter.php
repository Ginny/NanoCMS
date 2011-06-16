<?php

namespace FrontModule;

use Nette\Application\BadRequestException,
    Nette\Diagnostics\Debugger;

class DefaultPresenter extends \BasePresenter {

    /** @var Nette\Database\Table\Selection */
    private $page;
    private $menu;

    public function actionPage($slug) {
        $this->page = $this->getService('model')->findBySlug($slug);
        $this->menu = $this->getService('model')->getMenu();
        if (!$this->page) {
            throw new BadRequestException('Stránka nebyla nalezena!', 404);
        }
    }

    public function renderPage($slug) {
        $this->template->page = $this->page;
        $this->template->menu = $this->menu;
    }

}
