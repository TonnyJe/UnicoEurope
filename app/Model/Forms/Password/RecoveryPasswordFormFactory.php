<?php

declare(strict_types=1);

namespace App\Model\Forms\Password;

use Nette\Application\UI\Form;
use App\Model\Forms\FormFactory;
use Nette\Utils\ArrayHash;
use App\Model\Components\RecoveryPasswordForm\IRecoveryPasswordForm;

class RecoveryPasswordFormFactory implements IRecoveryPasswordForm
{
    /**
     * @var FormFactory
     */
    private $formFactory;

    use \Nette\SmartObject;
    
    public function __construct(FormFactory $formFactory)
    {
        $this->formFactory = $formFactory;
    }
    
    /**
     * Creates form for password recovery
     * 
     * @return Form Desired form
     */
    public function create(): Form
    {
        $form = $this->formFactory->create();
        
        $form->addEmail('email', 'E-Mail')
                ->setRequired('Povinné pole');
        
        $form->addSubmit('submit', 'Odeslat');
        
        $form->onSuccess[] = [$this, 'onSuccess'];
        
        return $form;
    }
    
    /**
     * On success method for this form
     * 
     * @param Form $form Submitted form
     * @param ArrayHash $values Values from that form
     */
    public function onSuccess(Form $form, ArrayHash $values): void
    {
        // TODO: send mail with recovery
    }
}
