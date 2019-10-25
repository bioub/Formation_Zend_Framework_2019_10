<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\InputFilter;

use Zend\Filter\StringTrim;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\NotEmpty;
use Zend\Validator\StringLength;

/**
 * Description of ContactInputFilter
 *
 * @author Administrateur
 */
class ContactInputFilter extends InputFilter
{

    public function __construct()
    {
        $input = new Input('prenom');
        //$input->isRequired();

        $filter = new StringTrim();
        $input->getFilterChain()->attach($filter);

        $validator = new NotEmpty();
        $validator->setMessage('Le prénom est obligatoire', NotEmpty::IS_EMPTY);
        $input->getValidatorChain()->attach($validator);

        $validator = new StringLength();
        $validator->setMax(40);
        $validator->setMessage('Le prénom est trop long', StringLength::TOO_LONG);
        $input->getValidatorChain()->attach($validator);

        $this->add($input);

        // retirer le validateur NotEmpty :
        // https://stackoverflow.com/questions/28125701/zf2-remove-isempty-validation-for-form-element
    }

}
