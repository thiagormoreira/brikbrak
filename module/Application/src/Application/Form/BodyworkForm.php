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

class BodyworkForm extends Form
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
        $hydrator = new DoctrineHydrator($this->em, '\Application\Entity\Bodywork');
        $this->setHydrator($hydrator);
    }

    public function addElements()
    {
        $this->add(array(
            'name' => 'idbodywork',
            'options' => array(
            ),
            'attributes' => array(
                'type' => 'hidden',
                'readonly' => 'readonly'
            )
        ));
        $this->add(array(
            'name' => 'bodyworkName',
            'options' => array(
                'label' => 'Nome'
            ),
            'attributes' => array(
                'type' => 'text'
            )
        ));

        $adGroup = new ObjectSelect('subtypeItem');
        $adGroup->setEmptyOption('Selecionar');
        $adGroup->setOptions(array(
            'object_manager' => $this->em,
            'target_class' => 'Application\Entity\Subtype',
            'property' => 'subtypeName',
            'label' => 'Tipo'
        ));
        $this->add($adGroup);
    }
    
    public function createInputFilter()
    {
        $inputFilter = new InputFilter();
    
        $bodyworkNameFilter = new Input('bodyworkName');
        $bodyworkNameFilter->setRequired(true);
        $bodyworkNameFilter->getFilterChain()->attach(new StringTrim());
        $bodyworkNameFilter->getFilterChain()->attach(new StripTags());
        $inputFilter->add($bodyworkNameFilter);
    
        return $inputFilter;
    }
}