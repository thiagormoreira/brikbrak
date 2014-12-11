<?php

namespace DoctrineORMModule\Proxy\__CG__\Application\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Model extends \Application\Entity\Model implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\Model' . "\0" . 'idmodel', '' . "\0" . 'Application\\Entity\\Model' . "\0" . 'modelName', '' . "\0" . 'Application\\Entity\\Model' . "\0" . 'brand', '' . "\0" . 'Application\\Entity\\Model' . "\0" . 'typeItem');
        }

        return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\Model' . "\0" . 'idmodel', '' . "\0" . 'Application\\Entity\\Model' . "\0" . 'modelName', '' . "\0" . 'Application\\Entity\\Model' . "\0" . 'brand', '' . "\0" . 'Application\\Entity\\Model' . "\0" . 'typeItem');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Model $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getIdmodel()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIdmodel();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIdmodel', array());

        return parent::getIdmodel();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', array());

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setIdmodel($idmodel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIdmodel', array($idmodel));

        return parent::setIdmodel($idmodel);
    }

    /**
     * {@inheritDoc}
     */
    public function getModelName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModelName', array());

        return parent::getModelName();
    }

    /**
     * {@inheritDoc}
     */
    public function setModelName($modelName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModelName', array($modelName));

        return parent::setModelName($modelName);
    }

    /**
     * {@inheritDoc}
     */
    public function getBrand()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBrand', array());

        return parent::getBrand();
    }

    /**
     * {@inheritDoc}
     */
    public function setBrand($brand)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBrand', array($brand));

        return parent::setBrand($brand);
    }

    /**
     * {@inheritDoc}
     */
    public function getTypeItem()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTypeItem', array());

        return parent::getTypeItem();
    }

    /**
     * {@inheritDoc}
     */
    public function setTypeItem($typeItem)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTypeItem', array($typeItem));

        return parent::setTypeItem($typeItem);
    }

}