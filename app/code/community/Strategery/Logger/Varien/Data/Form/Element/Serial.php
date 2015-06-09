<?php
class Strategery_Logger_Varien_Data_Form_Element_Serial extends Varien_Data_Form_Element_Abstract
{
    public function __construct($data)
    {
        parent::__construct($data);
        $this->setType('file');
    }

    public function getElementHtml()
    {
        $object = print_r(unserialize($this->_getObject()));

        return "<pre>$object</pre>";

    }

    protected function _getObject()
    {
        return $this->getValue();
    }

    public function getName()
    {
        return $this->getData('name');
    }
}
