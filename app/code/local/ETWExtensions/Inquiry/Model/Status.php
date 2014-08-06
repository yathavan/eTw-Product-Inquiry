<?php

class ETWExtensions_Inquiry_Model_Status extends Varien_Object {

    const STATUS_OPEN = "OPEN";
    const STATUS_HOLD = "HOLD";
    const STATUS_CLOSED = "CLOSED";

    static public function getOptionArray() {
        return array(
            self::STATUS_OPEN => Mage::helper('inquiry')->__('Open'),
            self::STATUS_HOLD => Mage::helper('inquiry')->__('Hold'),
            self::STATUS_CLOSED => Mage::helper('inquiry')->__('Closed')
        );
    }

}