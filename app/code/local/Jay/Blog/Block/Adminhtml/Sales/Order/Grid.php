<?php
class Jay_Blog_Block_Adminhtml_Sales_Order_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('jay_blog_grid');
		$this->setDefaultSort('myblogpost_id');
		$this->setDefaultDir('DESC');
		$this->setSaveParametersInSession(true);
		$this->setUseAjax(true);
	}

	protected function _prepareCollection()
	{
		 $collection = Mage::getModel('jay_blog/myposts')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
		$helper = Mage::helper('jay_blog');

        $this->addColumn('myblogpost_id', array(
            'header' => $helper->__('News ID'),
            'index' => 'myblogpost_id'
        ));

        $this->addColumn('title', array(
            'header' => $helper->__('Title'),
            'index' => 'title',
            'type' => 'text',
        ));
        $this->addColumn('post_category', array(
        		'header' => $helper->__('Category'),
        		'index' => 'post_category',
        		'type' => 'text',
        ));
        $this->addColumn('post_content', array(
        		'header' => $helper->__('Content'),
        		'index' => 'post_content',
        		'type' => 'text',
        ));

        $this->addColumn('created', array(
            'header' => $helper->__('Created'),
            'index' => 'created',
            'type' => 'date',
        ));

        return parent::_prepareColumns();
	}

	public function getGridUrl()
	{
		return $this->getUrl('*/*/grid', array('_current'=>true));
	}
}