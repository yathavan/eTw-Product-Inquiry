<?php

class ETWExtensions_Inquiry_Block_Adminhtml_Inquiry_Edit_Tab_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form();
        $this->setForm($form);
        $fieldset = $form->addFieldset('inquiry_form', array('legend' => Mage::helper('inquiry')->__('Enquiry Status')));

        $fieldset->addField('status', 'select', array(
            'label' => Mage::helper('inquiry')->__('Status'),
            'name' => 'status',
            'values' => array(
                array(
                    'value' => 'OPEN',
                    'label' => Mage::helper('inquiry')->__('Open'),
                ),
                array(
                    'value' => 'HOLD',
                    'label' => Mage::helper('inquiry')->__('Hold'),
                ),
                array(
                    'value' => 'CLOSED',
                    'label' => Mage::helper('inquiry')->__('Closed'),
                ),
            ),
        ));

        $fieldset->addField('inquiry_id', 'text', array(
            'label' => Mage::helper('inquiry')->__('Enquiry ID'),
            'required' => false,
            'name' => 'inquiry_id',
            'disabled' => 'disabled',
        ));

        $fieldset->addField('customer_id', 'text', array(
            'label' => Mage::helper('inquiry')->__('Customer ID'),
            'required' => false,
            'name' => 'customer_id',
            'disabled' => 'disabled',
        ));

        $fieldset->addField('customer_name', 'text', array(
            'label' => Mage::helper('inquiry')->__('Name'),
            'required' => false,
            'name' => 'customer_name',
            'disabled' => 'disabled',
        ));

        $fieldset->addField('customer_email', 'text', array(
            'label' => Mage::helper('inquiry')->__('Email'),
            'required' => false,
            'name' => 'customer_email',
            'disabled' => 'disabled',
        ));

        $fieldset->addField('sku', 'text', array(
            'label' => Mage::helper('inquiry')->__('SKU'),
            'required' => false,
            'name' => 'sku',
            'disabled' => 'disabled',
        ));

        $fieldset->addField('comment', 'editor', array(
            'name' => 'comment',
            'label' => Mage::helper('inquiry')->__('Comment'),
            'title' => Mage::helper('inquiry')->__('Comment'),
            'style' => 'width:700px; height:500px;',
            'wysiwyg' => false,
            'required' => false,
            'disabled' => 'disabled',
        ));

        if (Mage::getSingleton('adminhtml/session')->getWebData()) {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getWebData());
            Mage::getSingleton('adminhtml/session')->setWebData(null);
        } elseif (Mage::registry('inquiry_data')) {
            $form->setValues(Mage::registry('inquiry_data')->getData());
        }
        return parent::_prepareForm();
    }

}