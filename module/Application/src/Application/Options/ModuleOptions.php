<?php
namespace Application\Options;

use Zend\Stdlib\AbstractOptions;

/**
 *
 * @author loganguns
 *        
 */
class ModuleOptions
{

    /**
     * Turn off strict options mode
     */
    protected $__strictMode__ = false;

    /**
     * Array of data to show in the user list
     * Key = Label in the list
     * Value = entity property(expecting a 'getProperty())
     */
    protected $advertising = array(
        'Id' => 'idadvertising',
        'Texto' => 'text',
        'Usuario' => array(
            'user' => 'display_name'
        ),
        'Tipo' => array(
            'typeAdvertising' => 'type_name'
        )
    );

    protected $item = array(
        'Id' => 'iditem',
        'Modelo' => array(
            'model' => 'model_name'
        ),
        'Usuario' => array(
            'user' => 'display_name'
        ),
        'Ano' => 'year'
    );

    protected $bodywork = array(
        'Id' => 'idbodywork',
        'Nome' => 'bodywork_name'
    );

    protected $model = array(
        'Id' => 'idmodel',
        'Nome' => 'model_name'
    );

    protected $user = array(
        'Id' => 'id',
        'Nome' => 'display_name',
        'Email' => 'email'
    );

    protected $brand = array(
        'Id' => 'idbrand',
        'Nome' => 'brand_name'
    );

    protected $typeItem = array(
        'Id' => 'idtypeitem',
        'Nome' => 'type_name'
    );

    protected $subtype = array(
        'Id' => 'idsubtype',
        'Nome' => 'subtype_name'
    );

    protected $option = array(
        'Id' => 'idoptions',
        'Nome' => 'options_name'
    );

    public function getListElements($entity)
    {
        return $this->$entity;
    }
}
