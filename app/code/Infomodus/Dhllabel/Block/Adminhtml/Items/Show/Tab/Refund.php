<?php
/**
 * Copyright © 2015 Infomodus. All rights reserved.
 */

// @codingStandardsIgnoreFile

namespace Infomodus\Dhllabel\Block\Adminhtml\Items\Show\Tab;


use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;


class Refund extends Generic implements TabInterface
{

    public $elements = [];
    public $_conf;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Infomodus\Dhllabel\Helper\Config $config,
        array $data = []
    )
    {
        $this->_conf = $config;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function getTabLabel()
    {
        return __('RMA(return) labels');
    }

    /**
     * {@inheritdoc}
     */
    public function getTabTitle()
    {
        return __('RMA(return) labels');
    }

    /**
     * {@inheritdoc}
     */
    public function canShowTab()
    {
        $model = $this->_coreRegistry->registry('infomodus_dhllabel_items_show');
        if (in_array('refund', $model['label_types'])) {
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function isHidden()
    {
        $model = $this->_coreRegistry->registry('infomodus_dhllabel_items_show');
        if (!in_array('refund', $model['label_types'])) {
            return true;
        }
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
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('item_');
        $model = $this->_coreRegistry->registry('infomodus_dhllabel_items_show');
        $labels = $model['labels'];
        if (count($model['labels']) > 0) {
            foreach ($labels as $key => $label) {
                if ($label->getType2() != 'refund') {
                    continue;
                }
                $fieldset = $form->addFieldset('f_' . $label->getTrackingnumber(), ['legend' => __('Tracking number') . ': ' . $label->getTrackingnumber().' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Created: '.$label->getCreatedTime()]);
                $this->elements['f_' . $label->getTrackingnumber()]['label_element'] = $label;
                $fieldset->addField(
                    'shipidnumber_' . $label->getTrackingnumber(),
                    'checkbox',
                    [
                        'name' => 'label_ids[]',
                        'label' => __('Delete'),
                        'title' => __('Delete'),
                        'required' => false,
                        'value' => $label->getId(),
                        'style' => 'float: right;margin-top: 10px;margin-right: 25px;'
                    ]
                );
            }
        }
        $this->setForm($form);
        return parent::_prepareForm();
    }
}