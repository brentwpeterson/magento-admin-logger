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
class Strategery_Logger_Model_Observer {

    const OBJECT_TYPE_PRODUCT = "product";
    const OBJECT_TYPE_CMS = "cms";
    const OBJECT_TYPE_CUSTOMER = "customer";        
    const OBJECT_TYPE_INFO = "info";            
    
    public function info ($observer)
    {
        if ($this->_isLoggedIn()) {
            $logger =   $this->_getLogger();
            $logger->info(Mage::app()->getFrontController()->getRequest()->getPathInfo(), $this->_getContext($observer,"Info"));
        }
        
    }

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
        if (Mage::getSingleton('admin/session')->isLoggedIn()) {
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

    protected function _isLoggedIn()
    {
          return Mage::getSingleton('admin/session')->isLoggedIn();
    }

    protected function _getLogger()
    {
          return Mage::getModel('logger/logger');
    }

    protected function _getContext($observer, $action)
    {
        $type   =   OBJECT_TYPE_INFO;    
        return $this->_createContext($observer->getEvent()->getData(), $action, $type, $observer->getData());        
    }


    protected function _createContext($data, $action, $type, $observer)
    {  
        return $context = array(
                "object" => $data,
                "action" => $action,
                "object_type" => $type,                
                "observer" => $observer,
            );           
    }



}
