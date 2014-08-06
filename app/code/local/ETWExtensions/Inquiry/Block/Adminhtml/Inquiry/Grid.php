<?php

class ETWExtensions_Inquiry_Block_Adminhtml_Inquiry_Grid extends Mage_Adminhtml_Block_Widget_Grid {

    public function __construct() {
        parent::__construct();
        $this->setId('inquiryGrid');
        $this->setDefaultSort('inquiry_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
    }

    protected function _prepareCollection() {
        $collection = Mage::getModel('inquiry/inquiry')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns() {
        $this->addColumn('inquiry_id', array(
            'header' => Mage::helper('inquiry')->__('ID'),
            'align' => 'right',
            'width' => '60px',
            'index' => 'inquiry_id',
        ));

        $this->addColumn('customer_id', array(
            'header' => Mage::helper('inquiry')->__('Customer ID'),
            'align' => 'left',
            'width' => '100px',
            'index' => 'customer_id',
        ));

        $this->addColumn('customer_name', array(
            'header' => Mage::helper('inquiry')->__('Name'),
            'align' => 'left',
            'width' => '200px',
            'index' => 'customer_name',
        ));

        $this->addColumn('customer_email', array(
            'header' => Mage::helper('inquiry')->__('Email'),
            'align' => 'left',
            'width' => '200px',
            'index' => 'customer_email',
        ));

        $this->addColumn('sku', array(
            'header' => Mage::helper('inquiry')->__('SKU'),
            'align' => 'left',
            'index' => 'sku',
        ));

        $this->addColumn('comment', array(
            'header' => Mage::helper('inquiry')->__('Questions'),
            'index' => 'comment',
        ));

        $this->addColumn('created_time', array(
            'header' => Mage::helper('inquiry')->__('Date'),
            'width' => '130px',
            'index' => 'created_time',
        ));

        $this->addColumn('status', array(
            'header' => Mage::helper('inquiry')->__('Status'),
            'align' => 'left',
            'width' => '80px',
            'index' => 'status',
            'type' => 'options',
            'options' => array(
                'OPEN' => 'Open',
                'HOLD' => 'Hold',
                'CLOSED' => 'Closed'
            ),
        ));

        $this->addColumn('action', array(
            'header' => Mage::helper('inquiry')->__('Action'),
            'width' => '50px',
            'align' => 'center',
            'type' => 'action',
            'getter' => 'getId',
            'actions' => array(
                array(
                    'caption' => Mage::helper('inquiry')->__('Edit'),
                    'url' => array('base' => '*//*/edit'),
                    'field' => 'id'
                )
            ),
            'filter' => false,
            'sortable' => false,
            'index' => 'stores',
            'is_system' => true,
        ));

        $this->addExportType('*/*/exportCsv', Mage::helper('inquiry')->__('CSV'));
        $this->addExportType('*/*/exportXml', Mage::helper('inquiry')->__('XML'));

        return parent::_prepareColumns();
    }

    protected function _prepareMassaction() {
        $this->setMassactionIdField('inquiry_id');
        $this->getMassactionBlock()->setFormFieldName('inquiry');

        $this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('inquiry')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('inquiry')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('inquiry/status')->getOptionArray();

        array_unshift($statuses, array('label' => '', 'value' => ''));
        $this->getMassactionBlock()->addItem('status', array(
            'label' => Mage::helper('inquiry')->__('Change status'),
            'url' => $this->getUrl('*/*/massStatus', array('_current' => true)),
            'additional' => array(
                'visibility' => array(
                    'name' => 'status',
                    'type' => 'select',
                    'class' => 'required-entry',
                    'label' => Mage::helper('inquiry')->__('Status'),
                    'values' => $statuses
                )
            )
        ));
        return $this;
    }

    public function getRowUrl($row) {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }

}