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
class Strategery_Logger_Model_Observer_Customer extends Strategery_Logger_Model_Observer {

    public function create ($observer)
    {
        if ($this->_isLoggedIn()) {
            $logger =   $this->_getLogger();
            $logger->warning(Mage::app()->getFrontController()->getRequest()->getPathInfo(), $this->_getContext($observer,"Create"));
            
        }
    }

    public function read ($observer)
    {
        if ($this->_isLoggedIn()) {
            $logger =   $this->_getLogger();
            $logger->warning(Mage::app()->getFrontController()->getRequest()->getPathInfo(), $this->_getContext($observer,"Read"));
            
        }
    }


    public function update ($observer)
    {
        if ($this->_isLoggedIn()) {

            $logger =   $this->_getLogger();
            $logger->warning(Mage::app()->getFrontController()->getRequest()->getPathInfo(), $this->_getContext($observer,"Update"));

        }
    }
    
    
    public function destroy ($observer)
    {
        if ($this->_isLoggedIn()) {
   
            $logger =   $this->_getLogger();
            $logger->warning(Mage::app()->getFrontController()->getRequest()->getPathInfo(), $this->_getContext($observer,"Destroy"));
            
        }
    }

    protected function _getContext($observer, $action)
    {   
        $type   =   OBJECT_TYPE_CUSTOMER;
        return $this->_createContext($observer->getCustomer(), $action, $type, $observer->getData());        
    }

}
