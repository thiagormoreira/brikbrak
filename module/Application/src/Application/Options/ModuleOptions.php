<?php

namespace Application\Options;

use Zend\Stdlib\AbstractOptions;

/**
 * @author loganguns
 *
 */
class ModuleOptions extends AbstractOptions implements
    AdvertisingListOptionsInterface
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
    protected $advertisingListElements = array(
        'Id' => 'idadvertising',
        'Texto' => 'text',
        'Usuario' => array(
		'user' => 'display_name'
	),
        'Item' => array(
		'car' => array(
			'model' => 'model_name'	
		)
	)
    );
    protected $carListElements = array(
        'Id' => 'idcar',
	'Modelo' => array(
		'model' => 'model_name'	
	),
        'Ano' => 'year'
    );
    protected $cartListElements = array(
        'Id' => 'idcart',
	'Modelo' => array(
		'model' => 'model_name'	
	),
        'Ano' => 'year'
    );

    protected $userListElements = array(
        'Id' => 'id',
        'Nome' => 'display_name'
    );
    protected $advertising = array(
        'Id' => 'idadvertising',
        'Texto' => 'text',
        'Usuario' => array(
            'user' => 'display_name'
        ),
        'Item' => array(
            'car' => array(
                'model' => 'model_name'
            )
        )
    );

    protected $car = array(
        'Id' => 'idcar',
        'Modelo' => array(
            'model' => 'model_name'
        ),
        'Ano' => 'year'
    );

    protected $cart = array(
        'Id' => 'idcart',
        'Modelo' => array(
            'model' => 'model_name'
            )
    );

    protected $bodywork = array(
        'Id' => 'idbodywork',
        'Nome' => 'bodywork_name'
    );

    protected $model = array(
        'Id' => 'idmodel',
        'Nome' => 'model_name'
    );

    protected $brand = array(
        'Id' => 'idbrand',
        'Nome' => 'brand_name'
    );
    
    /**
     * Array of form elements to show when editing a user
     * Key = form label
     * Value = entity property(expecting a 'getProperty()/setProperty()' function)
     */
    protected $editFormElements = array();

    /**
     * Array of form elements to show when creating a user
     * Key = form label
     * Value = entity property(expecting a 'getProperty()/setProperty()' function)
     */
    protected $createFormElements = array();

    /**
     * @var bool
     * true = create password automaticly
     * false = administrator chooses password
     */
    protected $createUserAutoPassword = true;

    /**
     * @var int
     * Length of passwords created automatically
     */
    protected $autoPasswordLength = 8;

    /**
     * @var bool
     * Allow change user password on user edit form.
     */
    protected $allowPasswordChange = true;

    protected $userMapper = 'ZfcUserAdmin\Mapper\UserDoctrine';


    public function getListElements($entity)
    {
        return $this->$entity;
    }
    /**
     * @return the $userListElements
     */
    public function getUserListElements()
    {
        return $this->userListElements;
    }

 /**
     * @param multitype:string  $userListElements
     */
    public function setUserListElements($userListElements)
    {
        $this->userListElements = $userListElements;
    }

 public function setUserMapper($userMapper)
    {
        $this->userMapper = $userMapper;
    }

    public function getUserMapper()
    {
        return $this->userMapper;
    }

    public function setAdvertisingListElements(array $listElements)
    {
        $this->advertisingListElements = $listElements;
    }

    public function getAdvertisingListElements()
    {
        return $this->advertisingListElements;
    }

    public function getEditFormElements()
    {
        return $this->editFormElements;
    }

    public function setEditFormElements(array $elements)
    {
        $this->editFormElements = $elements;
    }

    public function setCreateFormElements(array $createFormElements)
    {
        $this->createFormElements = $createFormElements;
    }

    public function getCreateFormElements()
    {
        return $this->createFormElements;
    }

    public function setCreateUserAutoPassword($createUserAutoPassword)
    {
        $this->createUserAutoPassword = $createUserAutoPassword;
    }

    public function getCreateUserAutoPassword()
    {
        return $this->createUserAutoPassword;
    }

    public function getAllowPasswordChange()
    {
        return $this->allowPasswordChange;
    }

    public function setAdminPasswordChange($allowPasswordChange)
    {
        $this->allowPasswordChange = $allowPasswordChange;
    }

    public function setAutoPasswordLength($autoPasswordLength)
    {
        $this->autoPasswordLength = $autoPasswordLength;
    }

    public function getAutoPasswordLength()
    {
        return $this->autoPasswordLength;
    }

    public function getCarListElements()
    {
        return $this->carListElements;
    }

    public function setCarListElements($carListElements)
    {
        $this->carListElements = $carListElements;
        return $this;
    }
 
}
