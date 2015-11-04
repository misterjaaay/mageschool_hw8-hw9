<?php
class Jay_Blog_Block_Adminhtml_Sales_Order extends Mage_Adminhtml_Block_Widget_Grid_Container {
	public function __construct() {
		$this->_blockGroup = 'jay_blog';
		$this->_controller = 'adminhtml_sales_order';
		$this->_headerText = Mage::helper ( 'jay_blog' )->__ ( 'Jay - Blog' );
		
		parent::__construct ();
// 		$this->_removeButton ( 'add' );
	}
}

