<?php
/**
 * Copyright © 2015 Infomodus. All rights reserved.
 */

namespace Infomodus\Dhllabel\Controller\Adminhtml\Conformity;

class Index extends \Infomodus\Dhllabel\Controller\Adminhtml\Conformity
{
    /**
     * Conformity list.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Infomodus_Dhllabel::dhllabel');
        $resultPage->getConfig()->getTitle()->prepend(__('Infomodus Conformity'));
        $resultPage->addBreadcrumb(__('Infomodus'), __('Infomodus'));
        $resultPage->addBreadcrumb(__('Conformitys'), __('Conformitys'));
        return $resultPage;
    }
}
