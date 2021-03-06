<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Infomodus\Dhllabel\Controller\Adminhtml\Pdflabels;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;

/**
 * Class AbstractMassStatus
 */
abstract class AbstractMassAction extends \Magento\Backend\App\Action
{
    /**
     * @var string
     */
    protected $redirectUrl = '*/*/';

    /**
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $filter;

    /**
     * @var object
     */
    protected $collectionFactory;
    protected $shipmentCollectionFactory;
    protected $creditmemoCollectionFactory;
    protected $labelCollectionFactory;

    /**
     * @param Context $context
     * @param Filter $filter
     */
    public function __construct(Context $context, Filter $filter)
    {
        parent::__construct($context);
        $this->filter = $filter;
    }

    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        try {
            $collection = null;
            switch ($this->getRequest()->getParam('namespace')) {
                case 'sales_order_grid':
                    $collection = $this->filter->getCollection($this->collectionFactory->create());
                    break;
                case 'sales_order_shipment_grid':
                    $collection = $this->filter->getCollection($this->shipmentCollectionFactory->create());
                    break;
                case 'sales_order_creditmemo_grid':
                    $collection = $this->filter->getCollection($this->creditmemoCollectionFactory->create());
                    break;
                default:
                    $collection = $this->labelCollectionFactory->create()
                        ->addFieldToFilter('dhllabel_id', ['in' => $this->getRequest()->getParam('dhllabel_id')]);
                    break;
            }
            return $this->massAction($collection);
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
            /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
            $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
            return $resultRedirect->setPath($this->redirectUrl);
        }
    }

    /**
     * Return component referer url
     * TODO: Technical dept referer url should be implement as a part of Action configuration in in appropriate way
     *
     * @return null|string
     */
    protected function getComponentRefererUrl()
    {
        return $this->filter->getComponentRefererUrl() ?: 'infomodus_dhllabel/*/';
    }

    /**
     * Set status to collection items
     *
     * @param AbstractCollection $collection
     * @return ResponseInterface|ResultInterface
     */
    abstract
    protected function massAction(\Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection $collection);
}
