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

class AdvertisingForm extends Form
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
        $hydrator = new DoctrineHydrator($this->em, '\Application\Entity\Advertising');
        $this->setHydrator($hydrator);
    }

    public function addElements()
    {
        $this->add(array(
            'name' => 'idadvertising',
            'options' => array(
            ),
            'attributes' => array(
                'type' => 'hidden',
                'readonly' => 'readonly'
            )
        ));
        $this->add(array(
            'name' => 'text',
            'type' => 'Zend\Form\Element\Textarea',
            'options' => array(
                'label' => 'Texto'
            ),
            'attributes' => array(
                'type' => 'textarea',
            )
        ));
        
        $item = new ObjectSelect('item');
        $item->setEmptyOption('Selecionar item');
        $item->setOptions(array(
            'object_manager' => $this->em,
            'target_class' => 'Application\Entity\Item',
            'property' => 'iditem',
            'is_method' => true,
             'label' => 'Item',
            'find_method' => array(
            )
        ));
        $this->add($item);
        
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
        
        $this->add(array(
            'name' => 'status',
            'type' => 'Zend\Form\Element\Radio',
            'options' => array(
                'label' => 'Publicar',
                'value_options' => array(
                    '1' => 'Sim',
                    '0' => 'Não',
                ),
            ),
            'attributes' => array(
            )
        ));
    }

    public function createInputFilter()
    {
        $inputFilter = new InputFilter();
        
        $itemFilter = new Input('item');
        $itemFilter->setRequired(false);
        $inputFilter->add($itemFilter);
        
        // name Input
        $textFilter = new Input('text');
        $textFilter->setRequired(true);
        $textFilter->getFilterChain()->attach(new StringTrim());
        $textFilter->getFilterChain()->attach(new StripTags());
        $inputFilter->add($textFilter);
        
        // user Input
        $userFilter = new Input('user');
        $userFilter->setRequired(true);
        $userFilter->getFilterChain()->attach(new StringTrim());
        $userFilter->getFilterChain()->attach(new StripTags());
        $inputFilter->add($userFilter);
        
        return $inputFilter;
    }
}