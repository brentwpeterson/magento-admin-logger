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
$installer = $this;

$installer->startSetup();
$installer->run("
    DROP TABLE IF EXISTS `{$installer->getTable('logger/db')}`;
    CREATE TABLE `{$installer->getTable('logger/db')}` (
      `logger_id` int(11) NOT NULL auto_increment,
      `date` timestamp NOT NULL default CURRENT_TIMESTAMP,
      `object` text NOT NULL,
      `type` varchar(255) NOT NULL,
      `object_type` varchar(255),
      `ip` varchar(255),      
      `action` varchar(255) NOT NULL,
      `user` varchar(255) NOT NULL,      
      `message` text NOT NULL,
      `context` text,      
      PRIMARY KEY  (`logger_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

");
$installer->endSetup();
