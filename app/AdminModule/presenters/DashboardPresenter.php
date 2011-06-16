<?php

namespace AdminModule;

use Nette\Application\UI\Form,
    Nette\Http\User,
    Nette\Utils\Strings,
    Nette\Application as NA;

class DashboardPresenter extends BasePresenter {

    /** @var Nette\Database\Table\Selection */
    private $pages;

    protected function startup() {
        parent::startup();

        $this->pages = $this->getService('model')->getPages();

        // user authentication
        if (!$this->user->isLoggedIn()) {
            if ($this->user->logoutReason === User::INACTIVITY) {
                $this->flashMessage('Byl jste odhlášen z důvodu neaktivity. Přihlašte se prosím znovu.');
            }
            $backlink = $this->application->storeRequest();
            $this->redirect('Sign:in', array('backlink' => $backlink));
        }
    }

    /*     * ******************* view default ******************** */

    public function renderDefault() {
        $this->template->pages = $this->pages;
    }

    /*     * ******************* views add & edit ******************** */

    public function renderAdd() {
        $this['pageForm']['save']->caption = 'Přidat';
    }

    public function renderEdit($id = 0) {
        $form = $this['pageForm'];
        if (!$form->isSubmitted()) {
            $row = $this->pages->get($id);
            if (!$row) {
                throw new NA\BadRequestException('Záznam nebyl nalezen');
            }
            $form->setDefaults($row);
        }
    }

    /*     * ******************* view delete ******************** */

    public function renderDelete($id = 0) {
        $this->template->page = $this->pages->get($id);
        if (!$this->template->page) {
            throw new NA\BadRequestException('Záznam nebyl nalezen');
        }
    }

    /*     * ******************* component factories ******************** */

    /**
     * Album edit form component factory.
     * @return mixed
     */
    protected function createComponentPageForm() {
        $form = new Form;
        $form->addText('title', 'Nadpis:')
                ->setRequired('Vyplňte prosím nadpis stránky.');

        $form->addTextArea('text', 'Text:')
                ->setRequired('Vyplňte prosím text stránky.');

        $form->addSubmit('save', 'Uložit')->setAttribute('class', 'default');
        $form->addSubmit('cancel', 'Zrušit')->setValidationScope(NULL);
        $form->onSubmit[] = callback($this, 'pageFormSubmitted');

        $form->addProtection('Odešlete prosím formulář znovu (bezpečnostní token vypršel).');
        return $form;
    }

    public function pageFormSubmitted(Form $form) {
        $values = $form->values;
        $values->slug = Strings::webalize($values->title); // z title udelame url adresu-slug

        if ($form['save']->isSubmittedBy()) {
            $id = (int) $this->getParam('id');
            if ($id > 0) {
                $this->pages->find($id)->update($values);
                $this->flashMessage('Stránka byla upravena.');
            } else {
                $this->pages->insert($values);
                $this->flashMessage('Stránka byla přidána.');
            }
        }

        $this->redirect('default');
        
    }

    /**
     * Album delete form component factory.
     * @return mixed
     */
    protected function createComponentDeleteForm() {
        $form = new Form;
        $form->addSubmit('cancel', 'Zrušit');
        $form->addSubmit('delete', 'Smazat')->setAttribute('class', 'default');
        $form->onSubmit[] = callback($this, 'deleteFormSubmitted');
        $form->addProtection('Odešlete prosím formulář znovu (bezpečnostní token vypršel).');
        return $form;
    }

    public function deleteFormSubmitted(Form $form) {
        if ($form['delete']->isSubmittedBy()) {
            $this->pages->find($this->getParam('id'))->delete();
            $this->flashMessage('Stránka byla smazána.');
        }

        $this->redirect('default');
    }

}
