<?php

declare(strict_types=1);

namespace App\Model\Forms;

use Nette\Application\UI\Form;

class FormFactory
{
    use \Nette\SmartObject;
    
    /**
     * Creates form with default configuration
     * 
     * @return Form
     */
    public function create(): Form
    {
        $form = new Form();
        
        return $form;
    }
}
