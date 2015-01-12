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
        
        parent::__construct('newAdvertisingUserSteps', $options);
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
                'class' => 'form-control input-lg required',
                'id' => 'typeItem',
                'required' => 'required',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\TypeItem',
                'label' => 'Tipo de veículo',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
                'property' => 'typeName',
                'is_method' => true
        )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'brand',
            'attributes' => array(
                'class' => 'form-control input-lg required',
                //'style' => 'display:none',
                'required' => 'required',
                'id' => 'brand',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Brand',
                'label' => 'Marca',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
                'property' => 'brandName',
                'empty_option' => 'Selecione a marca...',
                'is_method' => true
            )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'brandN',
            'attributes' => array(
                'class' => 'form-control input-lg required',
                //'style' => 'display:none',
                'required' => 'required',
                'id' => 'brandN',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Brand',
                'label' => 'Marca',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
                'property' => 'brandName',
                'empty_option' => 'Selecione a marca...',
                'is_method' => true
            )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'model',
            'attributes' => array(
                'class' => 'form-control input-lg required',
                //'style' => 'display:none',
                'id' => 'model',
                'required' => 'required',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Model',
                'label' => 'Modelo',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
                'property' => 'modelName',
                'empty_option' => 'Selecione o modelo...',
                'is_method' => true
            )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'subType',
            'attributes' => array(
                'class' => 'form-control input-lg required',
                //'style' => 'display:none',
                'id' => 'subType',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Subtype',
                'label' => 'SubTipo',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
                'property' => 'subtypeName',
                'empty_option' => 'Selecione o tipo...',
                'is_method' => true
            )
        ));
        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'bodywork',
            'attributes' => array(
                'class' => 'form-control input-lg required',
                //'style' => 'display:none',
                'id' => 'bodywork',
                'required' => 'required',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\Bodywork',
                'label' => 'Carroceria',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
                'property' => 'bodyworkName',
                'empty_option' => 'Selecione a carroceria...',
                'is_method' => true
            )
        ));
        $this->add(array(
            'name' => 'km',
            'options' => array(
                'label' => 'Kilometragem',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Digite a Kilometragem',
                'class' => 'form-control input-lg required number',
                //'style' => 'display:none',
                'id' => 'km',
            )
        ));
        $this->add(array(
            'name' => 'color',
            'options' => array(
                'label' => 'Cor',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Digite a Cor',
                'class' => 'form-control input-lg required',
                //'style' => 'display:none',
                'required' => 'required',
                'id' => 'color',
            )
        ));
        $this->add(array(
            'name' => 'value',
            'options' => array(
                'label' => 'Valor',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Digite o Valor',
                'class' => 'form-control input-lg required number',
                //'style' => 'display:none',
                'required' => 'required',
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
                'label' => 'Endereço',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Endereço',
                'class' => 'form-control input-lg required',
                'required' => 'required',
            )
        ));
        $this->add(array(
            'name' => 'number',
            'options' => array(
                'label' => 'Numero',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Nº',
                'class' => 'form-control input-lg required'
            )
        ));
        $this->add(array(
            'name' => 'complement',
            'options' => array(
                'label' => 'Complemeneto',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Complemento',
                'class' => 'form-control input-lg',
            )
        ));
        $this->add(array(
            'name' => 'number',
            'options' => array(
                'label' => 'Numero',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Nº',
                'class' => 'form-control input-lg required number',
                'required' => 'required',
            )
        ));
        $this->add(array(
            'name' => 'district_name',
            'options' => array(
                'label' => 'Bairro',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Bairro',
                'class' => 'form-control input-lg required',
                'required' => 'required',
            )
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'state',
            'attributes' => array(
                'class' => 'form-control select-lg required',
                'id' => 'state',
                'required' => 'required',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\State',
                'label' => 'Estado',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
                'property' => 'stateName',
                'empty_option' => 'Selecione o estado...',
            'is_method' => true
            )
        ));

        $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'city',
            'attributes' => array(
                'class' => 'form-control select-lg required',
                'id' => 'state',
                'required' => 'required',
            ),
            'options' => array(
                'object_manager' => $this->em,
                'target_class' => 'Application\Entity\City',
                'label' => 'Estado',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
                'property' => 'cityName',
                'empty_option' => 'Selecione a cidade...',
            'is_method' => true
            )
        ));
        
        $this->add(array(
            'name' => 'contact-number',
            'options' => array(
                'label' => 'Telefone',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'text',
                'placeholder' => 'Telefone',
                'class' => 'form-control input-lg contact-number required',
                'pattern' => '\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}',
                'required' => 'required',
            )
        ));
        ////// FIM ENDEREÇO
        
        ////// ANUNCIO
        $this->add(array(
            'name' => 'text',
            'options' => array(
                'label' => 'Descrição',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'textarea',
                'placeholder' => 'Este texto aparecerá na descrição do seu anúncio...',
                'class' => 'form-control input-lg required',
                'required' => 'required',
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\File',
            'name' => 'image-file',
            'options' => array(
                'label' => 'Imagens do anuncio',
                'label_attributes' => array(
                    'class' => 'col-sm-4 control-label',
                ),
            ),
            'attributes' => array(
                'type' => 'file',
                'class' => 'form-control input-lg required',
                'multiple' => 'true',
                'id' => 'image-file',
            )
        ));
        /*
        $file = new Element\File('image-file');
        $file->setLabel('Imagens do anuncio')
        ->seLabeltAttribute('class', 'col-sm-4 control-label')
        ->setAttribute('id', 'image-file')
        ->setAttribute('class', 'form-control input-lg required')
        ->setAttribute('multiple', true);
        $this->add($file);
        */
        ////// FIM ANUNCIO
    }

    public function createInputFilter()
    {
        $inputFilter = new InputFilter();
        
        return $inputFilter;
    }
}