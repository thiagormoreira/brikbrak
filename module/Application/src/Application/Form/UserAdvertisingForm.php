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
    }
    
    public function addElements()
    {
        
        ////// INICIO ITEM
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'typeItem',
            'attributes' => array(
                'class' => 'form-control input-lg',
                'id' => 'typeItem',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\TypeItem',
                'label' => 'Tipo',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'typeName',
                'empty_option' => 'Selecione o tipo...',
                'is_method' => true
        )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'brand',
            'attributes' => array(
                'class' => 'form-control input-lg',
                'style' => 'display:none',
            'id' => 'brand',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Brand',
                'label' => 'Marca',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'brandName',
                'empty_option' => 'Selecione a marca...',
            'is_method' => true
        )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'model',
            'attributes' => array(
                'class' => 'form-control input-lg',
                'style' => 'display:none',
            'id' => 'model',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Model',
                'label' => 'Modelo',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'modelName',
                'empty_option' => 'Selecione o modelo...',
            'is_method' => true
        )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'subType',
            'attributes' => array(
                'class' => 'form-control input-lg',
                'style' => 'display:none',
            'id' => 'subType',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Subtype',
                'label' => 'SubTipo',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'subtypeName',
                'empty_option' => 'Selecione o tipo...',
            'is_method' => true
        )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'bodywork',
            'attributes' => array(
                'class' => 'form-control input-lg',
                'style' => 'display:none',
                'id' => 'bodywork',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Bodywork',
                'label' => 'Carroceria',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'bodyworkName',
                'empty_option' => 'Selecione a carroceria...',
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
                'placeholder' => 'Digite a Kilometragem',
                'class' => 'form-control input-lg',
                'style' => 'display:none',
            'id' => 'km',
            )
        ));
        $this->add(array(
            'name' => 'color',
            'options' => array(
                'label' => 'Cor'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Digite a Cor',
                'class' => 'form-control input-lg',
                'style' => 'display:none',
            'id' => 'color',
            )
        ));
        $this->add(array(
            'name' => 'value',
            'options' => array(
                'label' => 'Valor'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Digite o Valor',
                'class' => 'form-control input-lg',
                'style' => 'display:none',
            'id' => 'value',
            )
        ));
            /*
            $this->add(array(
                'name' => 'options',
                'type' => 'DoctrineModule\Form\Element\ObjectMultiCheckbox',
                //'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                'options' => array(
                    'label' => 'Opcionais',
                    'object_manager' => $this->em,
                    'target_class' => 'Application\Entity\Option',
                    'property' => 'optionsName'
                    ),
                'attributes' => array(
                    'multiple' => true,
                    'class' => 'multiselect',
                    //'expanded' => true, // Render as checkboxes
                    )
                ));
            */
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
            'name' => 'state',
            'attributes' => array(
                'class' => 'form-control select-lg',
                'id' => 'state',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\State',
                'label' => 'Estado',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'stateName',
                'empty_option' => 'Selecione o estado...',
            'is_method' => true
            )
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'city',
            'attributes' => array(
                'class' => 'form-control select-lg',
                'id' => 'state',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\City',
                'label' => 'Estado',
                // 'column-size' => 'sm-9',
                // 'label_attributes' => array('class' => 'col-sm-3 control-label'),
                'property' => 'cityName',
                'empty_option' => 'Selecione a cidade...',
            'is_method' => true
            )
        ));
        
        $this->add(array(
            'name' => 'contact-number',
            'options' => array(
                'label' => 'Telefone'
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Telefone',
                'class' => 'form-control input-lg contact-number',
                'pattern' => '\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}'
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
        
        $file = new Element\File('image-file');
        $file->setLabel('Imagens do anuncio')
        ->setAttribute('id', 'image-file')
        ->setAttribute('multiple', true);
        $this->add($file);
        ////// FIM ANUNCIO
    }

    public function createInputFilter()
    {
        $inputFilter = new InputFilter();
        
        
        
        return $inputFilter;
    }
}