<?php
/**
 * Copyright © . All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Advertising\Crud\Api\Data;

interface CustomSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{

    /**
     * Get custom list.
     * @return \Advertising\Crud\Api\Data\CustomInterface[]
     */
    public function getItems();

    /**
     * Set custom_field1 list.
     * @param \Advertising\Crud\Api\Data\CustomInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}

