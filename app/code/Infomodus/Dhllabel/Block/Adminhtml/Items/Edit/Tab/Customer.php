<?php
/**
 * Copyright © 2015 Infomodus. All rights reserved.
 */

// @codingStandardsIgnoreFile

namespace Infomodus\Dhllabel\Block\Adminhtml\Items\Edit\Tab;


use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;


class Customer extends Generic implements TabInterface
{
    protected $country;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Directory\Model\Config\Source\Country $country,
        array $data = []
    )
    {
        parent::__construct($context, $registry, $formFactory, $data);
        $this->country = $country;
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('Customer options');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('Customer options');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        return false;
    }

    /**
     * Prepare form before rendering HTML
     *
     * @return $this
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('current_infomodus_dhllabel_items');
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $htmlIdPrefix = 'item_';
        $form->setHtmlIdPrefix($htmlIdPrefix);
        $confParams = $model['handy']->defConfParams;
        $fieldset = $form->addFieldset('customer_fieldset', ['legend' => __('Customer options')]);
        $fieldset->addField(
            'shiptocompanyname',
            'text',
            ['name' => 'shiptocompanyname',
                'label' => __('Company name'),
                'title' => __('Company name'),
                'required' => true,
                'value' => $confParams['shiptocompanyname'],
            ]
        );
        $fieldset->addField(
            'shiptoattentionname',
            'text',
            ['name' => 'shiptoattentionname',
                'label' => __('Attention name'),
                'title' => __('Attention name'),
                'required' => true,
                'value' => $confParams['shiptoattentionname'],
            ]
        );
        $fieldset->addField(
            'shiptophonenumber',
            'text',
            ['name' => 'shiptophonenumber',
                'label' => __('Phone number'),
                'title' => __('Phone number'),
                'required' => true,
                'value' => $confParams['shiptophonenumber'],
            ]
        );
        $fieldset->addField(
            'shiptoaddressline1',
            'text',
            ['name' => 'shiptoaddressline1',
                'label' => __('Address line'),
                'title' => __('Address line'),
                'required' => true,
                'value' => $confParams['shiptoaddressline1'],
            ]
        );
        $fieldset->addField(
            'shiptoaddressline2',
            'text',
            ['name' => 'shiptoaddressline2',
                'label' => __('Address line 2'),
                'title' => __('Address line 2'),
                'required' => false,
                'value' => $confParams['shiptoaddressline2'],
            ]
        );
        $fieldset->addField(
            'shiptoaddressline3',
            'text',
            ['name' => 'shiptoaddressline3',
                'label' => __('Address line 3'),
                'title' => __('Address line 3'),
                'required' => false,
                'value' => $confParams['shiptoaddressline3'],
            ]
        );
        $fieldset->addField(
            'shiptocity',
            'text',
            ['name' => 'shiptocity',
                'label' => __('City'),
                'title' => __('City'),
                'required' => true,
                'value' => $confParams['shiptocity'],
            ]
        );
        $fieldset->addField(
            'shiptostateprovincecode',
            'text',
            ['name' => 'shiptostateprovincecode',
                'label' => __('State (province)'),
                'title' => __('State (province)'),
                'required' => false,
                'value' => $confParams['shiptostateprovincecode'],
            ]
        );
        $fieldset->addField(
            'shiptopostalcode',
            'text',
            ['name' => 'shiptopostalcode',
                'label' => __('Postal code'),
                'title' => __('Postal code'),
                'required' => true,
                'value' => $confParams['shiptopostalcode'],
            ]
        );
        $fieldset->addField(
            'shiptocountrycode',
            'select',
            ['name' => 'shiptocountrycode',
                'label' => __('Country code'),
                'title' => __('Country code'),
                'required' => true,
                'values' => $this->country->toOptionArray(),
                'value' => $confParams['shiptocountrycode'],
            ]
        );
        $fieldset->addField(
            'qvn_email_shipto',
            'text',
            ['name' => 'qvn_email_shipto',
                'label' => __('Email'),
                'title' => __('Email'),
                'required' => true,
                'value' => $confParams['qvn_email_shipto'],
            ]
        );
        $fieldset->addField(
            'shiptovat',
            'text',
            ['name' => 'shiptovat',
                'label' => __('VAT/Tax Number'),
                'title' => __('VAT/Tax Number'),
                'required' => false,
                'value' => $confParams['shiptovat'],
            ]
        );

        /*$form->setValues($model->getData());*/
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
