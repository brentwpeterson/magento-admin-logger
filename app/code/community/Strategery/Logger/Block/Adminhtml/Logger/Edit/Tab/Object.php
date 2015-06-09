<?php

class Strategery_Logger_Block_Adminhtml_Logger_Edit_Tab_Object extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('logger_form', array('legend'=>Mage::helper('logger')->__('Log information')));
      $fieldset->addType('serial','Strategery_Logger_Varien_Data_Form_Element_Serial');

      $fieldset->addField('object', 'serial', array(
          'label'     => Mage::helper('logger')->__('Object:'),
          'name'      => 'title',
      ));
              

                                           
      if ( Mage::getSingleton('adminhtml/session')->getLoggerData() )
      {
          $form->setValues(Mage::getSingleton('adminhtml/session')->getLoggerData());
          Mage::getSingleton('adminhtml/session')->setLoggerData(null);
      } elseif ( Mage::registry('logger_data') ) {
          $form->setValues(Mage::registry('logger_data')->getData());
      }
      return parent::_prepareForm();
  }
}
