<?php
class Jay_Blog_Block_Adminhtml_News_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

	protected function _construct()
	{
		$this->_blockGroup = 'jay_blog';
		$this->_controller = 'adminhtml_index';
	}

	public function getHeaderText()
	{
		$helper = Mage::helper('jay_blog');
		$model = Mage::registry('current_news');
		
		if ($model->getMyblogpostId()) {
			return $helper->__("Edit News item '%s'", $this->escapeHtml($model->getTitle()));
		} else {
			return $helper->__("Add News item");
		}
	}

}