<?php

class Strategery_Logger_Block_Adminhtml_Logger_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs
{

  public function __construct()
  {
      parent::__construct();
      $this->setId('logger_tabs');
      $this->setDestElementId('edit_form');
      $this->setTitle(Mage::helper('logger')->__('Strategery Logger'));
  }

  protected function _beforeToHtml()
  {
      $this->addTab('form_section', array(
          'label'     => Mage::helper('logger')->__('General'),
          'title'     => Mage::helper('logger')->__('Log Information'),
          'content'   => $this->getLayout()->createBlock('logger/adminhtml_logger_edit_tab_form')->toHtml(),
      ));
      $this->addTab('object_section', array(
          'label'     => Mage::helper('logger')->__('Object'),
          'title'     => Mage::helper('logger')->__('Object'),
          'content'   => $this->getLayout()->createBlock('logger/adminhtml_logger_edit_tab_object')->toHtml(),
      ));     
      $this->addTab('context_section', array(
          'label'     => Mage::helper('logger')->__('Context'),
          'title'     => Mage::helper('logger')->__('Context'),
          'content'   => $this->getLayout()->createBlock('logger/adminhtml_logger_edit_tab_context')->toHtml(),
      ));           
      return parent::_beforeToHtml();
  }
}
