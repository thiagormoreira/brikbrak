<?php
namespace Application\Form;
use Zend\Form\Form;
use Zend\Form\Element\Hidden;
use Zend\Form\Element\Text;
use Zend\Form\Element\Password;
use Zend\Form\Element\Button;
use Zend\Form\Element\Checkbox;
use Zend\Form\Element;
use Zend\Form\Element\Select;

class Create extends Form
{

    protected $userEditOptions;
    protected $entity;
    protected $elements;
    
    public function __construct ($name = null, $elements)
    {
        parent::__construct($name);

        if($name != null){
            $this->entity = $name;
        }
        if($elements != null){
            $this->elements = $elements;
        }
        $elements = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($elements));
        
        $i = 0;
        foreach ($elements as $key => $element)
        {
            $entities = array(
                'address',
                'advertising',
                'bodywork',
                'brand',
                'item',
                'city',
                'contact',
                'country',
                'model',
                'option',
                'state',
                'typeaddress',
                'typeitem',
                'typecontact',
                'user',
            );
            if($i != 0){
                if(!in_array($key, $entities )){
                    $add[$i] = new Text($element);
                    $add[$i]->setAttributes(
                        array(
                            'class' => 'form-control',
                            'placeholder' => $key,
                        ));
                
                    $this->add($add[$i]);
                } else {
                    $add[$i] = new Select($element);
                    $add[$i]->setAttributes(
                        array(
                            'class' => 'form-control',
                            'placeholder' => $key,
                        ));
                    
                    $this->add($add[$i]);
                }
            } else {
                $add[$i] = new Hidden($element);
                
                $this->add($add[$i]);
            }
            $i++;
        }
    }
}