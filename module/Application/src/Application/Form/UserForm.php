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

class UserForm extends Form
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
        $hydrator = new DoctrineHydrator($this->em, '\Application\Entity\User');
        $this->setHydrator($hydrator);
    }

    public function addElements()
    {
        $this->add(array(
            'name' => 'iduser',
            'options' => array(),
            'attributes' => array(
                'type' => 'hidden',
                'readonly' => 'readonly'
            )
        ));
        $this->add(array(
            'name' => 'displayName',
            'options' => array(
                'label' => 'Nome'
            ),
            'attributes' => array(
                'type' => 'text'
            )
        ));
        $this->add(array(
            'name' => 'email',
            'options' => array(
                'label' => 'Email'
            ),
            'attributes' => array(
                'type' => 'text'
            )
        ));
        $this->add(array(
            'name' => 'state',
            'type' => 'Zend\Form\Element\Checkbox',
            'options' => array(
                'label' => 'Ativado'
            ),
            'attributes' => array(
                'type' => 'checkbox'
            )
        ));
        $role = new ObjectSelect('role');
        $role->setEmptyOption('Selecionar nivel');
        $role->setOptions(array(
            'object_manager' => $this->em,
            'target_class' => 'Application\Entity\Role',
            'property' => 'roleId',
            'is_method' => true,
            'label' => 'Nível de acesso',
            'find_method' => array(
                )
        ));
        $this->add($role);
    }

    public function createInputFilter()
    {
        $inputFilter = new InputFilter();
        
        $nameFilter = new Input('displayName');
        $nameFilter->setRequired(true);
        $nameFilter->getFilterChain()->attach(new StringTrim());
        $nameFilter->getFilterChain()->attach(new StripTags());
        $inputFilter->add($nameFilter);
        
        return $inputFilter;
    }
}