<?php

declare(strict_types=1);

namespace App\Model\Components\RecoveryPasswordForm;

use App\Model\Components\RecoveryPasswordForm\ControlRecoveryPasswordForm;

interface IControlRecoveryPasswordFormFactory
{
    /**
     * Creates component with recovery password form
     * 
     * @param callable $callback Forms OnSuccess callback
     * 
     * @return ControlRecoveryPasswordForm Desired component
     */
    public function create(callable $callback = null): ControlRecoveryPasswordForm;
}
