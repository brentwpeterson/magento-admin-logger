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
class Strategery_Logger_Block_Adminhtml_Template_Grid_Renderer_User
    extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    } 
    protected function _getValue(Varien_Object $row)
    {       
        $val = $row->getData($this->getColumn()->getIndex());
        $val = str_replace("no_selection", "", $val);
        $user   =   Mage::getModel('admin/user')->load($val)->getName();
        return $user;
    }
}
