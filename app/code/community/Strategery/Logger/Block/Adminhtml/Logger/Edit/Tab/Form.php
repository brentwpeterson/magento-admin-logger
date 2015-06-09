<?php

class Strategery_Logger_Block_Adminhtml_Logger_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form
{
  protected function _prepareForm()
  {
      $form = new Varien_Data_Form();
      $this->setForm($form);
      $fieldset = $form->addFieldset('logger_form', array('legend'=>Mage::helper('logger')->__('Log information')));
      $fieldset->addType('username','Strategery_Logger_Varien_Data_Form_Element_Object');

      $fieldset->addField('user', 'username', array(
          'label'     => Mage::helper('logger')->__('User:'),
          'name'      => 'title',
      ));
      $fieldset->addField('ip', 'label', array(
          'label'     => Mage::helper('logger')->__('Ip:'),
          'name'      => 'title',
      ));
                      
      $fieldset->addField('date', 'label', array(
          'label'     => Mage::helper('logger')->__('Date:'),
          'name'      => 'title',
      ));
      
      $fieldset->addField('type', 'label', array(
          'label'     => Mage::helper('logger')->__('Type:'),
          'name'      => 'title',
      ));
      $fieldset->addField('object_type', 'label', array(
          'label'     => Mage::helper('logger')->__('Object type:'),
          'name'      => 'title',
      ));
      $fieldset->addField('action', 'label', array(
          'label'     => Mage::helper('logger')->__('Action:'),
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
