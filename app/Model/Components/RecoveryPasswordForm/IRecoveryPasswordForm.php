<?php

namespace App\Model\Components\RecoveryPasswordForm;

use Nette\Application\UI\Form;

interface IRecoveryPasswordForm
{
    /**
     * Creates form for password recovery
     * 
     * @return Form Desired form
     */
    public function create(): Form;
}
