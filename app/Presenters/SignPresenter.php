<?php

declare(strict_types=1);

namespace App\Presenters;

use App\Presenters\BasePresenter;
use App\Model\Components\RecoveryPasswordForm\IControlRecoveryPasswordFormFactory;
use Nette\Application\UI\Control;

final class SignPresenter extends BasePresenter
{

    /**
     * @var IControlRecoveryPasswordFormFactory
     */
    private $recoveryPasswordFormFactory;

    public function __construct(IControlRecoveryPasswordFormFactory $recoveryPasswordFormFactory)
    {
        parent::__construct();
        $this->recoveryPasswordFormFactory = $recoveryPasswordFormFactory;
    }
    
    public function createComponentRecoveryPasswordForm(): Control
    {
        $component = $this->recoveryPasswordFormFactory->create();
        
        $component->onSuccessCallback = [$this, 'onSuccessRecoveryPasswordForm'];
        
        return $component;
    }
    
    public function onSuccessRecoveryPasswordForm(): void
    {
        $this->flashMessage('Vaše heslo bylo obnoveno');
        if ($this->isAjax()) {
            $this->redrawControl('flashes');
        } else {
            $this->redirect('this');
        }
    }
}
