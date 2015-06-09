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
class Strategery_Logger_Model_Db extends Mage_Core_Model_Abstract
{
    public function _construct ()
    {
        $this->_init('logger/db');
    }

}




