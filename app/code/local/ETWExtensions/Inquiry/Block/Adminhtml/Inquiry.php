<?php

class ETWExtensions_Inquiry_Block_Adminhtml_Inquiry extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {
        $this->_controller = 'adminhtml_inquiry';
        $this->_blockGroup = 'inquiry';
        $this->_headerText = Mage::helper('inquiry')->__('Inquiry');
        $this->setTemplate('widget/grid/container.phtml');  // use for disable add new button
        //$this->_addButtonLabel = Mage::helper('inquiry')->__('Add Item');
        //parent::__construct(); //comment for not display Add new Button
    }

}