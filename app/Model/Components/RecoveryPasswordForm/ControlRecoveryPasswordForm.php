<?php

declare(strict_types=1);

namespace App\Model\Components\RecoveryPasswordForm;

use Nette\Application\UI\Control;
use App\Model\Components\RecoveryPasswordForm\IRecoveryPasswordForm;
use Nette\Application\UI\Form;
use Nette\Http\Request;

/**
 * @property-write callable $onSuccessCallback Callback which may be call after form succeeded
 */
class ControlRecoveryPasswordForm extends Control
{

    /**
     * @var Request
     */
    private $request;

    /**
     * @var IRecoveryPasswordForm
     */
    private $recoveryPasswordForm;
    
    /**
     * @var callable Callback called after form cucceeded
     */
    private $successCallback;

    public function __construct(
            IRecoveryPasswordForm $recoveryPasswordForm,
            Request $request,
            callable $callback = null)
    {
        $this->recoveryPasswordForm = $recoveryPasswordForm;
        $this->request = $request;
        $this->successCallback = $callback;
    }
    
    public function render(): void
    {
        $this->template->render(__DIR__ . '/default.latte');
    }
    
    public function createComponentRecoveryPasswordForm(): Form
    {
        $form = $this->recoveryPasswordForm->create();
        $form->onSubmit[] = [$this, 'onSubmit'];
        $form->onSuccess[] = $this->onSuccessCallback;
        return $form;
    }
    
    public function onSubmit(): void
    {
        if ($this->request->isAjax()) {
            $this->redrawControl('recPassForm');
        }
    }
    
    public function setOnSuccessCallback(callable $callback): void
    {
        $this->onSuccessCallback = $callback;
    }
}
