<?php
class Jay_Blog_Block_Adminhtml_News_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{

	protected function _prepareForm()
	{
		$helper = Mage::helper('jay_blog');
		$model = Mage::registry('current_news');

		$form = new Varien_Data_Form(array(
				'myblogpost_id' => 'edit_form',
				'action' => $this->getUrl('*/*/save', array(
						'id' => $this->getRequest()->getParam('myblogpost_id')
				)),
				'method' => 'post',
				'enctype' => 'multipart/form-data'
		));

		$this->setForm($form);

		$fieldset = $form->addFieldset('news_form', array('legend' => $helper->__('News Information')));

		$fieldset->addField('title', 'text', array(
				'label' => $helper->__('Title'),
				'required' => true,
				'name' => 'title',
		));
		$fieldset->addField('post_category', 'editor', array(
				'label' => $helper->__('Category'),
				'required' => true,
				'name' => 'post_category',
		));
		$fieldset->addField('post_content', 'editor', array(
				'label' => $helper->__('Content'),
				'required' => true,
				'name' => 'post_content',
		));

		$fieldset->addField('created', 'date', array(
				'format' => Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT),
				'image' => $this->getSkinUrl('images/grid-cal.gif'),
				'label' => $helper->__('Created'),
				'name' => 'created'
		));

		$form->setUseContainer(true);

		if($data = Mage::getSingleton('adminhtml/session')->getFormData()){
			$form->setValues($data);
		} else {
			$form->setValues($model->getData());
		}

		return parent::_prepareForm();
	}

}