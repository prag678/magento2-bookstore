<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magediary\Bookstore\Api;

interface AuthorRepositoryInterface
{
    /**
     * Save author
     *
     * @param \Magediary\Bookstore\Api\Data\AuthorInterface $author
     * @return \Magediary\Bookstore\Api\Data\AuthorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Magediary\Bookstore\Api\Data\AuthorInterface $author
    );

    /**
     * Retrieve author
     *
     * @param string $authorId
     * @return \Magediary\Bookstore\Api\Data\AuthorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($authorId);

    /**
     * Retrieve author matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magediary\Bookstore\Api\Data\AuthorSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete author
     *
     * @param \Magediary\Bookstore\Api\Data\AuthorInterface $author
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Magediary\Bookstore\Api\Data\AuthorInterface $author
    );

    /**
     * Delete author by ID
     *
     * @param string $authorId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($authorId);
}
