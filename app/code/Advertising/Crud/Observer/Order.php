<?php

namespace Advertising\Crud\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;
use Advertising\Crud\Model\Custom as CustomModel;

class Order implements ObserverInterface
{
    /** @var CustomModel */
    protected $customModel;

    /**
     * @param CustomModel $customModel
     */
    public function __construct(CustomModel $customModel){
        $this->customModel = $customModel;
    }


    public function execute(Observer $observer){

        $order = $observer->getEvent()->getOrder();
        $orderId = $order->getEntityId();

        $custom = $this->customModel;
        $custom->setCustomField1($orderId)
               ->save();
    }
}