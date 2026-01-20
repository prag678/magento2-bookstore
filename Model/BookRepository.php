<?php
declare(strict_types=1);

namespace Magediary\Bookstore\Model;

use Magediary\Bookstore\Api\Data\BookInterface;
use Magediary\Bookstore\Api\Data\BookInterfaceFactory;
use Magediary\Bookstore\Api\Data\BookSearchResultsInterfaceFactory;
use Magediary\Bookstore\Api\BookRepositoryInterface;
use Magediary\Bookstore\Model\ResourceModel\Book as ResourceBook;
use Magediary\Bookstore\Model\ResourceModel\Book\CollectionFactory as BookCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

/**
 * BookRepository implementation for CRUD and Search operations
 */
class BookRepository implements BookRepositoryInterface
{
    /**
     * @var ResourceBook
     */
    protected $resource;

    /**
     * @var BookInterfaceFactory
     */
    protected $bookFactory;

    /**
     * @var BookCollectionFactory
     */
    protected $bookCollectionFactory;

    /**
     * @var BookSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * BookRepository constructor
     *
     * @param ResourceBook $resource
     * @param BookInterfaceFactory $bookFactory
     * @param BookCollectionFactory $bookCollectionFactory
     * @param BookSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface $collectionProcessor
     */
    public function __construct(
        ResourceBook $resource,
        BookInterfaceFactory $bookFactory,
        BookCollectionFactory $bookCollectionFactory,
        BookSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->bookFactory = $bookFactory;
        $this->bookCollectionFactory = $bookCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    /**
     * Save book
     *
     * @param BookInterface $book
     * @return BookInterface
     * @throws CouldNotSaveException
     */
    public function save(BookInterface $book)
    {
        try {
            $this->resource->save($book);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__('Could not save the book: %1', $exception->getMessage()));
        }
        return $book;
    }

    /**
     * Get book by ID
     *
     * @param int $bookId
     * @return BookInterface
     * @throws NoSuchEntityException
     */
    public function get($bookId)
    {
        $book = $this->bookFactory->create();
        $this->resource->load($book, $bookId);
        if (!$book->getId()) {
            throw new NoSuchEntityException(__('Book with id "%1" does not exist.', $bookId));
        }
        return $book;
    }

    /**
     * Get book list based on search criteria
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return \Magediary\Bookstore\Api\Data\BookSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        $collection = $this->bookCollectionFactory->create();
        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }

    /**
     * Delete a book
     *
     * @param BookInterface $book
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(BookInterface $book)
    {
        try {
            $bookModel = $this->bookFactory->create();
            $this->resource->load($bookModel, $book->getBookId());
            $this->resource->delete($bookModel);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__('Could not delete the book: %1', $exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete book by ID
     *
     * @param int $bookId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($bookId)
    {
        return $this->delete($this->get($bookId));
    }
}
