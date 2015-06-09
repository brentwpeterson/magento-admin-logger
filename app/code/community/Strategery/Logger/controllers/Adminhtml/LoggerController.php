<?php

class Strategery_Logger_Adminhtml_LoggerController extends Mage_Adminhtml_Controller_action
{

    protected function _initAction()
    {
        $this->loadLayout()
            ->_setActiveMenu('logger/items')
            ->_addBreadcrumb(
                Mage::helper('adminhtml')->__('Logger Manager'), Mage::helper('adminhtml')->__('Logger Manager')
            );

        return $this;
    }

    public function indexAction()
    {
        $this->_initAction()
            ->renderLayout();
    }

	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('logger/db')->load($id);

		if ($model->getLoggerId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('logger_data', $model);


			$this->loadLayout();
			$this->_setActiveMenu('logger/items');

			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item Manager'), Mage::helper('adminhtml')->__('Item Manager'));
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

			$this->getLayout()->getBlock('head')->setCanLoadExtJs(true);
			
			$this->_addContent($this->getLayout()->createBlock('logger/adminhtml_logger_edit'))
				->_addLeft($this->getLayout()->createBlock('logger/adminhtml_logger_edit_tabs'));

			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('logger')->__('Item does not exist'));
			$this->_redirect('*/*/');
		}
	}

    public function exportExcelAction()  
    {  
        $fileName   = 'logger_'.date("d-m-Y").'.xls';
 
        /**
        * This is the part where Grid Columns and Data are created as Excel XML and returned as stream.
        * The implementation of this code is done in the parent class of Grid Mynamespace_Mymodule_Block_Adminhtml_Grid
        * And that class should be Mage_Adminhtml_Block_Widget_Grid
        */
        $content    = $this->getLayout()->createBlock("Strategery_Logger_Block_Adminhtml_Logger_Grid")->getExcel($fileName);
 
        /**
        * This is for Force Download implemented below
        */
        $this->_prepareDownloadResponse($fileName, $content);
    }  
    /**
     * Force Download Code block in your controller
     * Declare headers and content file in responce for file download
     *
     * @param string $fileName
     * @param string $content set to null to avoid starting output, $contentLength should be set explicitly in that case
     * @param string $contentType
     * @param int $contentLength explicit content length, if strlen($content) isn't applicable
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _prepareDownloadResponse($fileName, $content, 
                                                $contentType = 'application/octet-stream', $contentLength = null)
    {
        $session = Mage::getSingleton('admin/session');
        if ($session->isFirstPageAfterLogin()) {
            $this->_redirect($session->getUser()->getStartupPageUrl());
            return $this;
        }
        $this->getResponse()
            ->setHttpResponseCode(200)
            ->setHeader('Pragma', 'public', true)
            ->setHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0', true)
            ->setHeader('Content-type', $contentType, true)
            ->setHeader('Content-Length', is_null($contentLength) ? strlen($content) : $contentLength)
            ->setHeader('Content-Disposition', 'attachment; filename=' . $fileName)
            ->setHeader('Last-Modified', date('r'));
        if (!is_null($content)) {
            $this->getResponse()->setBody($content);
        }
        return $this;
    }       
}
