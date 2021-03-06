<?php

namespace DoctrineORMModule\Proxy\__CG__\Application\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Item extends \Application\Entity\Item implements \Doctrine\ORM\Proxy\Proxy
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
    public static $lazyPropertiesDefaults = array('user' => NULL);



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {
        unset($this->user);

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }

    /**
     * 
     * @param string $name
     */
    public function __get($name)
    {
        if (array_key_exists($name, $this->__getLazyProperties())) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__get', array($name));

            return $this->$name;
        }

        trigger_error(sprintf('Undefined property: %s::$%s', __CLASS__, $name), E_USER_NOTICE);
    }

    /**
     * 
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->__getLazyProperties())) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__set', array($name, $value));

            $this->$name = $value;

            return;
        }

        $this->$name = $value;
    }

    /**
     * 
     * @param  string $name
     * @return boolean
     */
    public function __isset($name)
    {
        if (array_key_exists($name, $this->__getLazyProperties())) {
            $this->__initializer__ && $this->__initializer__->__invoke($this, '__isset', array($name));

            return isset($this->$name);
        }

        return false;
    }

    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'iditem', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'year', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'value', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'fuel', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'km', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'color', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'gear', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'new', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'model', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'typeItem', 'user', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'advertising', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'options');
        }

        return array('__isInitialized__', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'iditem', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'year', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'value', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'fuel', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'km', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'color', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'gear', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'new', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'model', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'typeItem', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'advertising', '' . "\0" . 'Application\\Entity\\Item' . "\0" . 'options');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Item $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

            unset($this->user);
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
    public function getIditem()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getIditem();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getIditem', array());

        return parent::getIditem();
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
    public function setIditem($iditem)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setIditem', array($iditem));

        return parent::setIditem($iditem);
    }

    /**
     * {@inheritDoc}
     */
    public function getYear()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getYear', array());

        return parent::getYear();
    }

    /**
     * {@inheritDoc}
     */
    public function setYear($year)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setYear', array($year));

        return parent::setYear($year);
    }

    /**
     * {@inheritDoc}
     */
    public function getValue()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getValue', array());

        return parent::getValue();
    }

    /**
     * {@inheritDoc}
     */
    public function setValue($value)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setValue', array($value));

        return parent::setValue($value);
    }

    /**
     * {@inheritDoc}
     */
    public function getFuel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFuel', array());

        return parent::getFuel();
    }

    /**
     * {@inheritDoc}
     */
    public function setFuel($fuel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFuel', array($fuel));

        return parent::setFuel($fuel);
    }

    /**
     * {@inheritDoc}
     */
    public function getKm()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getKm', array());

        return parent::getKm();
    }

    /**
     * {@inheritDoc}
     */
    public function setKm($km)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setKm', array($km));

        return parent::setKm($km);
    }

    /**
     * {@inheritDoc}
     */
    public function getColor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getColor', array());

        return parent::getColor();
    }

    /**
     * {@inheritDoc}
     */
    public function setColor($color)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setColor', array($color));

        return parent::setColor($color);
    }

    /**
     * {@inheritDoc}
     */
    public function getNew()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNew', array());

        return parent::getNew();
    }

    /**
     * {@inheritDoc}
     */
    public function setNew($new)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNew', array($new));

        return parent::setNew($new);
    }

    /**
     * {@inheritDoc}
     */
    public function getModel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModel', array());

        return parent::getModel();
    }

    /**
     * {@inheritDoc}
     */
    public function setModel($model)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModel', array($model));

        return parent::setModel($model);
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

    /**
     * {@inheritDoc}
     */
    public function getOptions()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOptions', array());

        return parent::getOptions();
    }

    /**
     * {@inheritDoc}
     */
    public function setOptions($options)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOptions', array($options));

        return parent::setOptions($options);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', array());

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser($user)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', array($user));

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getGear()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getGear', array());

        return parent::getGear();
    }

    /**
     * {@inheritDoc}
     */
    public function setGear($gear)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setGear', array($gear));

        return parent::setGear($gear);
    }

    /**
     * {@inheritDoc}
     */
    public function addOptions($options)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addOptions', array($options));

        return parent::addOptions($options);
    }

    /**
     * {@inheritDoc}
     */
    public function removeOptions($option)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeOptions', array($option));

        return parent::removeOptions($option);
    }

    /**
     * {@inheritDoc}
     */
    public function setOption($option = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOption', array($option));

        return parent::setOption($option);
    }

    /**
     * {@inheritDoc}
     */
    public function getOption()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOption', array());

        return parent::getOption();
    }

    /**
     * {@inheritDoc}
     */
    public function getAdvertising()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAdvertising', array());

        return parent::getAdvertising();
    }

    /**
     * {@inheritDoc}
     */
    public function setAdvertising($advertising)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAdvertising', array($advertising));

        return parent::setAdvertising($advertising);
    }

}
