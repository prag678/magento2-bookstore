<?php
declare(strict_types=1);

namespace Magediary\Bookstore\Model;

use Magediary\Bookstore\Api\AuthorRepositoryInterface;
use Magediary\Bookstore\Api\Data\AuthorInterface;
use Magediary\Bookstore\Api\Data\AuthorInterfaceFactory;
use Magediary\Bookstore\Api\Data\AuthorSearchResultsInterfaceFactory;
use Magediary\Bookstore\Model\ResourceModel\Author as ResourceAuthor;
use Magediary\Bookstore\Model\ResourceModel\Author\CollectionFactory as AuthorCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * Repository class for managing Author entities
 */
class AuthorRepository implements AuthorRepositoryInterface
{
    /**
     * @var ResourceAuthor
     */
    protected $resource;

    /**
     * @var AuthorInterfaceFactory
     */
    protected $authorFactory;

    /**
     * @var AuthorCollectionFactory
     */
    protected $authorCollectionFactory;

    /**
     * @var AuthorSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * AuthorRepository constructor
     *
     * @param ResourceAuthor $resource
     * @param AuthorInterfaceFactory $authorFactory
     * @param AuthorCollectionFactory $authorCollectionFactory
     * @param AuthorSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceAuthor $resource,
        AuthorInterfaceFactory $authorFactory,
        AuthorCollectionFactory $authorCollectionFactory,
        AuthorSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->authorFactory = $authorFactory;
        $this->authorCollectionFactory = $authorCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Save Author entity
     *
     * @param AuthorInterface $author
     * @return AuthorInterface
     * @throws CouldNotSaveException
     */
    public function save(AuthorInterface $author)
    {
        try {
            $this->resource->save($author);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Could not save the author: %1', $exception->getMessage()));
        }
        return $author;
    }

    /**
     * Retrieve Author by ID
     *
     * @param int $authorId
     * @return AuthorInterface
     * @throws NoSuchEntityException
     */
    public function get($authorId)
    {
        $author = $this->authorFactory->create();
        $this->resource->load($author, $authorId);
        if (!$author->getId()) {
            throw new NoSuchEntityException(__('Author with id "%1" does not exist.', $authorId));
        }
        return $author;
    }

    /**
     * Retrieve list of authors based on search criteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Magediary\Bookstore\Api\Data\AuthorSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        $collection = $this->authorCollectionFactory->create();
        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Delete Author entity
     *
     * @param AuthorInterface $author
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(AuthorInterface $author)
    {
        try {
            $authorModel = $this->authorFactory->create();
            $this->resource->load($authorModel, $author->getAuthorId());
            $this->resource->delete($authorModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__('Could not delete the author: %1', $exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete Author by ID
     *
     * @param int $authorId
     * @return bool
     * @throws NoSuchEntityException
     * @throws CouldNotDeleteException
     */
    public function deleteById($authorId)
    {
        return $this->delete($this->get($authorId));
    }
}
