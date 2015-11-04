<?php
class Jay_Blog_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action {
	/**
	 * Index action
	 */
	public function indexAction() {
		$this->_title ( $this->__ ( 'Sales' ) )->_title ( $this->__ ( 'Jay Blog' ) );
		$this->loadLayout ();
		$this->_setActiveMenu ( 'sales/sales' );
		$this->_addContent ( $this->getLayout ()->createBlock ( 'jay_blog/adminhtml_sales_order' ) );
		$this->renderLayout ();
	}
	public function gridAction()
	{
		$this->loadLayout();
		$this->getResponse()->setBody(
				$this->getLayout()->createBlock('jay_blog/adminhtml_sales_order_grid')->toHtml()
				);
	}
	public function newAction()
	{
		$this->_forward('edit');
	}
	
	public function editAction()
	{
		$id = (int) $this->getRequest()->getParam('myblogpost_id');
		$load = Mage::getModel('jay_blog/myposts')->load($id);
		Mage::register('current_news', $load);
	
		$this->loadLayout()->_setActiveMenu('jay_blog');
		$this->_addContent(
				$this->getLayout()
				->createBlock('jay_blog/adminhtml_news_edit'));
		$this->renderLayout();
		
	}
	
}