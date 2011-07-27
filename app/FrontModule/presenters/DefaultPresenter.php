<?php

namespace FrontModule;

use Nette\Application\BadRequestException,
    Nette\Diagnostics\Debugger;

class DefaultPresenter extends \BasePresenter {

    /** @var Nette\Database\Table\Selection */
    private $page;
    private $menu;

     public function actionPage($slug = NULL) {
 
        if (is_null($slug)) {
  
            $slug = $this->getModel('PagesModel')->findFirstPage()->slug; // vybere první záznam z tabulky pages
 
    }
 
        $this->page = $this->getModel('PagesModel')->findBySlug($slug);
  
        $this->menu = $this->getModel('PagesModel')->getMenu();
 
        if (!$this->page) {
  
            throw new BadRequestException('Stránka nebyla nalezena!', 404);
 
        }
  
    }
  

  
    public function renderPage($slug = NULL) {
  
        if (is_null($slug)) {
  
            $slug = $this->getModel('PagesModel')->findFirstPage()->slug; // vybere první záznam z tabulky pages
  }
    
  
        $this->template->page = $this->page;
  
        $this->template->menu = $this->menu;
  
    }

}
