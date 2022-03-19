<?php
/**
 * Copyright © . All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Advertising\Crud\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CustomRepositoryInterface
{

    /**
     * Save custom
     * @param \Advertising\Crud\Api\Data\CustomInterface $custom
     * @return \Advertising\Crud\Api\Data\CustomInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Advertising\Crud\Api\Data\CustomInterface $custom
    );

    /**
     * Retrieve custom
     * @param string $customId
     * @return \Advertising\Crud\Api\Data\CustomInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($customId);

    /**
     * Retrieve custom matching the specified criteria.
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Advertising\Crud\Api\Data\CustomSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete custom
     * @param \Advertising\Crud\Api\Data\CustomInterface $custom
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Advertising\Crud\Api\Data\CustomInterface $custom
    );

    /**
     * Delete custom by ID
     * @param string $customId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($customId);
}

