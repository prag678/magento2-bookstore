<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magediary\Bookstore\Api;

interface BookRepositoryInterface
{
    /**
     * Save book
     *
     * @param \Magediary\Bookstore\Api\Data\BookInterface $book
     * @return \Magediary\Bookstore\Api\Data\BookInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Magediary\Bookstore\Api\Data\BookInterface $book
    );

    /**
     * Retrieve book
     *
     * @param string $bookId
     * @return \Magediary\Bookstore\Api\Data\BookInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($bookId);

    /**
     * Retrieve book matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magediary\Bookstore\Api\Data\BookSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete book
     *
     * @param \Magediary\Bookstore\Api\Data\BookInterface $book
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Magediary\Bookstore\Api\Data\BookInterface $book
    );

    /**
     * Delete book by ID
     *
     * @param string $bookId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($bookId);
}
