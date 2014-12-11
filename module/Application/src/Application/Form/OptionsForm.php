<?php

namespace Application\Form;

use Doctrine\ORM\EntityManager;
use Zend\Form\Form;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Element\Password;
use Zend\Form\Element\Button;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element;
use Zend\Form\Element\Select;
use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator;
use Zend\Validator\StringLength;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineModule\Form\Element\ObjectSelect;
use Zend\Filter\StringTrim;
use Zend\Filter\StripTags;

class OptionsForm extends Form
{
    protected $entityManager;
    
    protected $moduleService;
    
    protected $pageService;
    
    protected $serviceLocator;
    
    protected $objectManager;
    
    public function __construct(EntityManager $em, $name = null, $options = array())
    {
        $this->em = $em;
    
        parent::__construct('category', $options);
        $this->addElements();
        $this->setInputFilter($this->createInputFilter());
        $hydrator = new DoctrineHydrator($this->em, '\Application\Entity\Options');
        $this->setHydrator($hydrator);
    }
    
    public function addElements()
    {
        $this->add(array(
            'name' => 'idoptions',
            'options' => array(
                //'label' => 'Id'
            ),
            'attributes' => array(
                'type' => 'hidden',
                'readonly' => 'readonly'
            )
        ));
        $this->add(array(
            'name' => 'optionsName',
            'options' => array(
                'label' => 'Nome'
            ),
            'attributes' => array(
                'type' => 'text'
            )
        ));
    }
    
    public function createInputFilter()
    {
        $inputFilter = new InputFilter();
    
        $optionsNameFilter = new Input('optionsName');
        $optionsNameFilter->setRequired(true);
        $optionsNameFilter->getFilterChain()->attach(new StringTrim());
        $optionsNameFilter->getFilterChain()->attach(new StripTags());
        $inputFilter->add($optionsNameFilter);
    
        return $inputFilter;
    }
}