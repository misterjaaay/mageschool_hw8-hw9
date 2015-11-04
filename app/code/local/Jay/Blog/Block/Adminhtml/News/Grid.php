<?php
class Jay_Blog_Block_Adminhtml_News_Grid extends Mage_Adminhtml_Block_Widget_Grid {
	public function getRowUrl($model) {
		return $this->getUrl ( '*/*/edit', array (
				'myblogpost_id' => $model->getId () 
		) );
	}
}