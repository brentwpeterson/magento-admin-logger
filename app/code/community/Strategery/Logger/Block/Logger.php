<?php
class Strategery_Logger_Block_Logger extends Mage_Core_Block_Template
{
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }
    
     public function getLogger()     
     { 
        if (!$this->hasData('logger')) {
            $this->setData('logger', Mage::registry('logger'));
        }
        return $this->getData('logger');
        
     }
}
