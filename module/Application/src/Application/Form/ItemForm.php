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
                'name' => 'gear',
                'type' => 'Zend\Form\Element\Radio',
                'options' => array(
                    'label' => 'Gear',
                    'value_options' => array(
                        '1' => 'Manual',
                        '2' => 'Automático',
                    ),
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
            
            $this->add(array(
                'name' => 'options',
                'type' => 'DoctrineModule\Form\Element\ObjectMultiCheckbox',
                'options' => array(
                    'label' => 'Opcionais',
                    'object_manager' => $this->em,
                    'target_class' => 'Application\Entity\Option',
                    'property' => 'optionsName'
                    ),
                'attributes' => array(
                    'multiple' => true,
                    )
                ));
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