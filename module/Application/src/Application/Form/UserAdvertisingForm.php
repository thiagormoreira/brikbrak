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

class UserAdvertisingForm extends Form
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
        //$hydrator = new DoctrineHydrator($this->em, '\Application\Entity\Item');
        //$this->setHydrator($hydrator);
    }
    
    public function addElements()
    {
        
        ////// INICIO ITEM
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'typeItem',
            'attributes' => array(),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\TypeItem',
                'label' => 'Tipo',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'typeName',
            'is_method' => true
        )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'brand',
            'attributes' => array(),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Brand',
                'label' => 'Marca',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'brandName',
            'is_method' => true
        )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'model',
            'attributes' => array(),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Model',
                'label' => 'Modelo',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'modelName',
            'is_method' => true
        )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'subType',
            'attributes' => array(),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Subtype',
                'label' => 'SubTipo',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'subtypeName',
            'is_method' => true
        )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'bodywork',
            'attributes' => array(),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Bodywork',
                'label' => 'Carroceria',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'bodyworkName',
            'is_method' => true
        )
        ));
        $this->add(array(
            'name' => 'km',
            'options' => array(
                'label' => 'Kilometragem'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Digite a Kilometragem'
            )
        ));
        $this->add(array(
            'name' => 'color',
            'options' => array(
                'label' => 'Cor'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Digite a Cor'
            )
        ));
        $this->add(array(
            'name' => 'value',
            'options' => array(
                'label' => 'Valor'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Digite o Valor'
            )
        ));
        /////// FIM ITEM
        
        /////// ENDEREÇO
        $this->add(array(
            'name' => 'address',
            'options' => array(
                'label' => 'Endereço'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Endereço',
                'class' => 'form-control input-lg'
            )
        ));
        $this->add(array(
            'name' => 'number',
            'options' => array(
                'label' => 'Numero'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Nº',
                'class' => 'form-control input-lg'
            )
        ));
        $this->add(array(
            'name' => 'complement',
            'options' => array(
                'label' => 'Complemeneto'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Complemento',
                'class' => 'form-control input-lg'
            )
        ));
        $this->add(array(
            'name' => 'number',
            'options' => array(
                'label' => 'Numero'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Nº',
                'class' => 'form-control input-lg'
            )
        ));
        $this->add(array(
            'name' => 'district_name',
            'options' => array(
                'label' => 'Bairro'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Bairro',
                'class' => 'form-control input-lg'
            )
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'city',
            'attributes' => array(
                'class' => 'form-control select-lg'
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\City',
                'label' => 'Cidade',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'cityName',
            'is_method' => true
            )
        ));
        ////// FIM ENDEREÇO
        
        ////// ANUNCIO
        $this->add(array(
            'name' => 'text',
            'options' => array(
                'label' => 'Descrição'
            ),
            'attributes' => array(
                'type' => 'textarea',
                'placeholder' => 'Este texto aparecerá na descrição do seu anúncio...',
                'class' => 'form-control select-lg'
            )
        ));
        ////// FIM ANUNCIO
    }

    public function createInputFilter()
    {
        $inputFilter = new InputFilter();
        
        
        
        return $inputFilter;
    }
}