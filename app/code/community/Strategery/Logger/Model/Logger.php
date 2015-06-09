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
require_once(Mage::getBaseDir('lib') . '/Psr/Log/LoggerInterface.php');
require_once(Mage::getBaseDir('lib') . '/Psr/Log/AbstractLogger.php');

class Strategery_Logger_Model_Logger extends \Psr\Log\AbstractLogger {
    
    public function log($level, $message, array $context = array())
    {
        try {
            $db =   Mage::getModel('logger/db');
            $db->setObject(serialize($context["object"]));        
            $db->setType($level);
            $db->setObjectType($context["object_type"]);                
            $db->setAction($context["action"]);
            $db->setUser(Mage::getSingleton('admin/session')->getUser()->getUserId());    
            $db->setMessage($message);   
            $db->setIp(Mage::helper('core/http')->getRemoteAddr());           
            $db->setContext(serialize($context["observer"]));                  

            return $db->save();               
        
        } catch (Exception $e) {

            Mage::logException($e);
        
        }
    }

    public function info($message, array $context = array())
    {
        return $this->log("Info", $message, $context);
    }

    public function warning($message, array $context = array())
    {
        return $this->log("Warning", $message, $context);
    }

    public function error($message, array $context = array())
    {
        return $this->log("Error", $message, $context);
    }
    
}
