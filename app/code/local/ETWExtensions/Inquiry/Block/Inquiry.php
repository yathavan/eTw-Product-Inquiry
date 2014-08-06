<?php

class ETWExtensions_Inquiry_Block_Inquiry extends Mage_Core_Block_Template {

    public function _prepareLayout() {
        return parent::_prepareLayout();
    }

    public function getWeb() {
        if (!$this->hasData('inquiry')) {
            $this->setData('inquiry', Mage::registry('inquiry'));
        }
        return $this->getData('inquiry');
    }

}