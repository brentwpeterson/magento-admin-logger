<?php
/**
 * Strategery Admin Logger
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Staregery Admin Logger License
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.binpress.com/license/view/l/fc11796e7089f10a662a5ebdac9cdd1c
 *
 * @category    Strategery
 * @package     Strategery_Logger
 * @copyright   Copyright (c) 2013 Strategery Inc. (http://www.usestrategery.com)
 * @license     http://www.binpress.com/license/view/l/fc11796e7089f10a662a5ebdac9cdd1c
 */
class Strategery_Logger_Block_Adminhtml_Logger_View extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();

        $this->_objectId = 'id';
        $this->_blockGroup = 'logger';
        $this->_controller = 'adminhtml_logger';


        $this->_formScripts[] = "
            function toggleEditor() {
                if (tinyMCE.getInstanceById('logger_content') == null) {
                    tinyMCE.execCommand('mceAddControl', false, 'logger_content');
                } else {
                    tinyMCE.execCommand('mceRemoveControl', false, 'logger_content');
                }
            }

            function saveAndContinueEdit(){
                editForm.submit($('edit_form').action+'back/edit/');
            }
        ";
    }

    public function getHeaderText()
    {
        if (Mage::registry('logger_data') && Mage::registry('logger_data')->getObject()) {
            return Mage::helper('logger')->__("View log '%s'", $this->htmlEscape(Mage::registry('logger_data')->getObject()));
        } else {
            return Mage::helper('logger')->__('Add Item');
        }
    }
}
