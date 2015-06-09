<?php
class Strategery_Logger_Block_Adminhtml_Logger_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('loggerGrid');
      $this->setDefaultSort('logger_id');
      $this->setDefaultDir('DESC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('logger/db')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
  

      $this->addColumn(
          'user', array(
          'header'    => Mage::helper('logger')->__('User'),
          'align'     =>'left',
          'width'     => '150px',
          'index'     => 'user',
          'renderer'     => 'Strategery_Logger_Block_Adminhtml_Template_Grid_Renderer_User',                    
      )
      );            
      $this->addColumn(
          'date', array(
          'header'    => Mage::helper('logger')->__('Date'),
          'align'     =>'left',
          'width'     => '150px',
          'index'     => 'date',
      )
      );
      $this->addColumn(
          'action', array(
          'header'    => Mage::helper('logger')->__('Action'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'action',
      )
      );            
      $this->addColumn(
          'type', array(
          'header'    => Mage::helper('logger')->__('Type'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'type',
      )
      );           
      $this->addColumn(
          'object_type', array(
          'header'    => Mage::helper('logger')->__('Object type'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'object_type',
      )
      );         
      $this->addColumn(
          'message', array(
          'header'    => Mage::helper('logger')->__('Message'),
          'align'     =>'left',
          'width'     => '50px',
          'index'     => 'message',
      )
      );         


        $this->addExportType('*/*/exportExcel', Mage::helper('logger')->__('XLS'));

      return parent::_prepareColumns();
  }

  public function getRowUrl($row)
  {
      return  $this->getUrl('*/*/edit', array('id' => $row->getLoggerId()));
  }

}
