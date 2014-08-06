<?php

class ETWExtensions_Inquiry_Block_Adminhtml_Inquiry_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

    public function __construct() {
        parent::__construct();
        $this->setId('inquiry_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('inquiry')->__('Item Information'));
    }

    protected function _beforeToHtml() {
        $this->addTab('form_section', array(
            'label' => Mage::helper('inquiry')->__('Item Information'),
            'title' => Mage::helper('inquiry')->__('Item Information'),
            'content' => $this->getLayout()->createBlock('inquiry/adminhtml_inquiry_edit_tab_form')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }

}