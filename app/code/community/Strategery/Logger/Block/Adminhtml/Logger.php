<?php
class Strategery_Logger_Block_Adminhtml_Logger extends Mage_Adminhtml_Block_Widget_Grid_Container
{
  public function __construct()
  {
    $this->_controller = 'adminhtml_logger';
    $this->_blockGroup = 'logger';
    $this->_headerText = Mage::helper('logger')->__('Log Viewer');
    parent::__construct();
  }
}
