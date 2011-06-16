<?php

namespace AdminModule;

use Nette\Application\UI\Form,
    Nette\Security as NS;

class SignPresenter extends BasePresenter {

    /** @persistent */
    public $backlink = '';

    public function startup() {
        parent::startup();
        $this->session->start(); // required by $form->addProtection()
    }

    /*     * ******************* component factories ******************** */

    /**
     * Sign in form component factory.
     * @return Nette\Application\UI\Form
     */
    protected function createComponentSignInForm() {
        $form = new Form;
        $form->addText('username', 'Účet:')
                ->setRequired('Vyplňte prosím účet.');

        $form->addPassword('password', 'Heslo:')
                ->setRequired('Vyplňte prosím heslo.');

        $form->addSubmit('send', 'Přihlásit se');

        $form->onSubmit[] = callback($this, 'signInFormSubmitted');
        return $form;
    }

    public function signInFormSubmitted($form) {
        try {
            $values = $form->getValues();
            $this->user->login($values->username, $values->password);
            $this->application->restoreRequest($this->backlink);
            $this->redirect('Dashboard:');
        } catch (NS\AuthenticationException $e) {
            $form->addError($e->getMessage());
        }
    }

    public function actionOut() {
        $this->getUser()->logout();
        $this->flashMessage('Byl jste odhlášen.');
        $this->redirect('in');
    }

}
