<?php

class Strategery_Logger_Block_Adminhtml_Logger_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
                 
        $this->_objectId = 'id';
        $this->_blockGroup = 'logger';
        $this->_controller = 'adminhtml_logger';
        
        $this->_removeButton('save');
        $this->_removeButton('delete');
        $this->_removeButton('reset');        
    }

    public function getHeaderText()
    {
        return Mage::helper('logger')->__("View Log");
    }
}
