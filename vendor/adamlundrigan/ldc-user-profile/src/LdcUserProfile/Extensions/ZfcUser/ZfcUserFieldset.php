<?php
/**
 * LdcUserProfile
 *
 * @link      http://github.com/adamlundrigan/LdcUserProfile for the canonical source repository
 * @copyright Copyright (c) 2014 Adam Lundrigan & Contributors
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace LdcUserProfile\Extensions\ZfcUser;

use Zend\Form\Fieldset;
use ZfcUser\Form\Base as ZfcUserBaseForm;

class ZfcUserFieldset extends Fieldset
{
    public function __construct(ZfcUserBaseForm $baseForm)
    {
        parent::__construct('zfcuser');
        $this->add(array(
            'name' => 'display_name',
            'type' => 'Text',
            'options' => array(
                'label' => 'Nome:'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));
        
        $this->add(array(
            'name' => 'password',
            'type' => 'Password',
            'options' => array(
                'label' => 'Senha:'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));
        
        $this->add(array(
            'name' => 'passwordVerify',
            'type' => 'Password',
            'options' => array(
                'label' => 'Confimar Senha:'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));
        
        $this->add(array(
            'name' => 'email',
            'type' => 'Email',
            'options' => array(
                'label' => 'Email:'
            ),
            'attributes' => array(
                'class' => 'form-control input-lg'
            )
        ));
        foreach ( array('userId', 'username', 'email' => '', 'display_name' => '', 'password' => '', 'passwordVerify' => '') as $field ) {
            if ( $baseForm->has($field) ) {
                $newName = ($field == 'userId' ? 'id' : $field);
                $this->add($baseForm->get($field), array('name' => $newName));
            }
        }
    }
}
