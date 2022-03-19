<?php
/**
 * Copyright © . All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Advertising\Crud\Model\ResourceModel\Custom;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @inheritDoc
     */
    protected $_idFieldName = 'custom_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Advertising\Crud\Model\Custom::class,
            \Advertising\Crud\Model\ResourceModel\Custom::class
        );
    }
}

