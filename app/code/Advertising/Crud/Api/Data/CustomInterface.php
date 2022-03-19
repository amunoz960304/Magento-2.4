<?php
/**
 * Copyright © . All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Advertising\Crud\Api\Data;

interface CustomInterface
{

    const CUSTOM_ID = 'custom_id';
    const CUSTOM_FIELD1 = 'custom_field1';

    /**
     * Get custom_id
     * @return string|null
     */
    public function getCustomId();

    /**
     * Set custom_id
     * @param string $customId
     * @return \Advertising\Crud\Custom\Api\Data\CustomInterface
     */
    public function setCustomId($customId);

    /**
     * Get custom_field1
     * @return string|null
     */
    public function getCustomField1();

    /**
     * Set custom_field1
     * @param string $customField1
     * @return \Advertising\Crud\Custom\Api\Data\CustomInterface
     */
    public function setCustomField1($customField1);
}

