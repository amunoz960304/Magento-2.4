<?php
/**
 * Copyright © . All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Advertising\Crud\Model;

use Advertising\Crud\Api\Data\CustomInterface;
use Magento\Framework\Model\AbstractModel;

class Custom extends AbstractModel implements CustomInterface
{

    /**
     * @inheritDoc
     */
    public function _construct()
    {
        $this->_init(\Advertising\Crud\Model\ResourceModel\Custom::class);
    }

    /**
     * @inheritDoc
     */
    public function getCustomId()
    {
        return $this->getData(self::CUSTOM_ID);
    }

    /**
     * @inheritDoc
     */
    public function setCustomId($customId)
    {
        return $this->setData(self::CUSTOM_ID, $customId);
    }

    /**
     * @inheritDoc
     */
    public function getCustomField1()
    {
        return $this->getData(self::CUSTOM_FIELD1);
    }

    /**
     * @inheritDoc
     */
    public function setCustomField1($customField1)
    {
        return $this->setData(self::CUSTOM_FIELD1, $customField1);
    }
}

