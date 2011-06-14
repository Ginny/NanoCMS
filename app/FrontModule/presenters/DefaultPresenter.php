<?php

namespace FrontModule;

use Nette\Application\BadRequestException,
    Nette\Diagnostics\Debugger;

class DefaultPresenter extends \BasePresenter {

    /** @var Nette\Database\Table\Selection */
    private $page;

    public function actionPage($slug) {
        $this->page = $this->getService('model')->findBySlug($slug);
        if (!$this->page) {
            throw new BadRequestException('Page not found!', 404);
        }
    }

    public function renderPage($slug) {
        $this->template->page = $this->page;
    }

}
