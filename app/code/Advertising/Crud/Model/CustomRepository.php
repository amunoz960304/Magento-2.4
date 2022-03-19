<?php
/**
 * Copyright © . All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Advertising\Crud\Model;

use Advertising\Crud\Api\CustomRepositoryInterface;
use Advertising\Crud\Api\Data\CustomInterface;
use Advertising\Crud\Api\Data\CustomInterfaceFactory;
use Advertising\Crud\Api\Data\CustomSearchResultsInterfaceFactory;
use Advertising\Crud\Model\ResourceModel\Custom as ResourceCustom;
use Advertising\Crud\Model\ResourceModel\Custom\CollectionFactory as CustomCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class CustomRepository implements CustomRepositoryInterface
{

    /**
     * @var Custom
     */
    protected $searchResultsFactory;

    /**
     * @var CustomInterfaceFactory
     */
    protected $customFactory;

    /**
     * @var CustomCollectionFactory
     */
    protected $customCollectionFactory;

    /**
     * @var ResourceCustom
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;


    /**
     * @param ResourceCustom $resource
     * @param CustomInterfaceFactory $customFactory
     * @param CustomCollectionFactory $customCollectionFactory
     * @param CustomSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceCustom $resource,
        CustomInterfaceFactory $customFactory,
        CustomCollectionFactory $customCollectionFactory,
        CustomSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->customFactory = $customFactory;
        $this->customCollectionFactory = $customCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * @inheritDoc
     */
    public function save(CustomInterface $custom)
    {
        try {
            $this->resource->save($custom);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the custom: %1',
                $exception->getMessage()
            ));
        }
        return $custom;
    }

    /**
     * @inheritDoc
     */
    public function get($customId)
    {
        $custom = $this->customFactory->create();
        $this->resource->load($custom, $customId);
        if (!$custom->getId()) {
            throw new NoSuchEntityException(__('custom with id "%1" does not exist.', $customId));
        }
        return $custom;
    }

    /**
     * @inheritDoc
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ) {
        $collection = $this->customCollectionFactory->create();
        
        $this->collectionProcessor->process($criteria, $collection);
        
        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        
        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }
        
        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * @inheritDoc
     */
    public function delete(CustomInterface $custom)
    {
        try {
            $customModel = $this->customFactory->create();
            $this->resource->load($customModel, $custom->getCustomId());
            $this->resource->delete($customModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__(
                'Could not delete the custom: %1',
                $exception->getMessage()
            ));
        }
        return true;
    }

    /**
     * @inheritDoc
     */
    public function deleteById($customId)
    {
        return $this->delete($this->get($customId));
    }
}

