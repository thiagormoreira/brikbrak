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
class ItemForm extends Form
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
            $hydrator = new DoctrineHydrator($this->em, '\Application\Entity\Item');
            $this->setHydrator($hydrator);
        }
        
        public function addElements()
        {
            /*
            $this->add(array(
                'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                'name' => 'typeItem',
                'attributes' => array(
                    'disabled' => 'disabled',
                ),
                'options' => array(
                    'object_manager' => $this->em,
                    'target_class' => 'Application\Entity\TypeItem',
                    'label' => 'Tipo',
                    'property' => 'typeName',
                    'readonly' => 'readonly',
                'is_method' => true
            )
            ));
            $this->add(array(
                'name' => 'iditem',
                'options' => array(
                    //'label' => 'Id'
                ),
                'attributes' => array(
                'type' => 'hidden',
                'readonly' => 'readonly'
                )
            ));
            */
            $this->add(array(
                'name' => 'year',
                'options' => array(
                    'label' => 'Ano'
                ),
                'attributes' => array(
                    'type' => 'text'
                )
            ));
            $this->add(array(
                'name' => 'value',
                'options' => array(
                    'label' => 'Valor'
                ),
                'attributes' => array(
                )
            ));
            $this->add(array(
                'name' => 'km',
                'options' => array(
                    'label' => 'Km'
                ),
                'attributes' => array(
                )
            ));
            $this->add(array(
                'name' => 'color',
                'options' => array(
                    'label' => 'Cor'
                ),
                'attributes' => array(
                )
            ));
            $this->add(array(
                'name' => 'new',
                'type' => 'Zend\Form\Element\Checkbox',
                'options' => array(
                    'label' => 'Novo'
                ),
                'attributes' => array(
                )
            ));
            
            
            $user = new ObjectSelect('user');
            $user->setEmptyOption('Selecionar usuário');
            $user->setOptions(array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\User',
                'property' => 'displayName',
                'is_method' => true,
                'label' => 'Usuário',
                'find_method' => array(
                    //'name' => 'findBy',
                    //'params' => array(
                    //    'criteria' => array(
                    //        'user' => 2
                    //    )
                    //)
                )
            ));
            $this->add($user);
            
            $adGroup = new ObjectSelect('model');
            $adGroup->setEmptyOption('Selecionar');
            $adGroup->setOptions(array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Model',
                'property' => 'modelName',
                'is_method' => true,
                 'label' => 'Modelo'
            ));
            $this->add($adGroup);
    }
    
    public function createInputFilter()
    {
        $inputFilter = new InputFilter();
    
        $bodyworkNameFilter = new Input('year');
        $bodyworkNameFilter->setRequired(true);
        $bodyworkNameFilter->getFilterChain()->attach(new StringTrim());
        $bodyworkNameFilter->getFilterChain()->attach(new StripTags());
        $inputFilter->add($bodyworkNameFilter);
    
        return $inputFilter;
    }
}