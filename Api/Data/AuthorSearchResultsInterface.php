<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magediary\Bookstore\Api\Data;

interface AuthorSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get Post list.
     *
     * @return \Magediary\Bookstore\Api\Data\AuthorInterface[]
     */
    public function getItems();

    /**
     * Set content list.
     *
     * @param \Magediary\Bookstore\Api\Data\AuthorInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
