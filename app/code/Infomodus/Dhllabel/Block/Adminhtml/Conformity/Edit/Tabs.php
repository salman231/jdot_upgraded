<?php
/**
 * Copyright © 2015 Infomodus. All rights reserved.
 */
namespace Infomodus\Dhllabel\Block\Adminhtml\Conformity\Edit;

class Tabs extends \Magento\Backend\Block\Widget\Tabs
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('infomodus_dhllabel_conformity_edit_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Compliance'));
    }
}
