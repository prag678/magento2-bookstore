<?php
/**
 * Author Model
 *
 * Represents an author entity in the Bookstore module.
 * Provides access to author data and related books.
 *
 * @category Magediary
 * @package  Magediary_Bookstore
 */

namespace Magediary\Bookstore\Model;

use Magento\Framework\Model\AbstractModel;
use Magediary\Bookstore\Api\Data\AuthorInterface;
use Magediary\Bookstore\Model\ResourceModel\Book\CollectionFactory as BookCollectionFactory;
use Magento\Framework\Exception\LocalizedException;

/**
 * Author model that implements AuthorInterface.
 * Used to access author attributes and related book information.
 */
class Author extends AbstractModel implements AuthorInterface
{
    /**
     * @var BookCollectionFactory
     */
    protected $bookCollectionFactory;

    /**
     * Author constructor
     *
     * @param BookCollectionFactory $bookCollectionFactory
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource|null $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb|null $resourceCollection
     * @param array $data
     */
    public function __construct(
        BookCollectionFactory $bookCollectionFactory,
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->bookCollectionFactory = $bookCollectionFactory;
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Magediary\Bookstore\Model\ResourceModel\Author::class);
    }

    /**
     * Get author ID
     *
     * @return int|null
     */
    public function getAuthorId()
    {
        return $this->getData(self::AUTHOR_ID);
    }

    /**
     * Set author ID
     *
     * @param int $authorId
     * @return $this
     */
    public function setAuthorId(int $authorId)
    {
        return $this->setData(self::AUTHOR_ID, $authorId);
    }

    /**
     * Get author name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set author name
     *
     * @param string $name
     * @return $this
     */
    public function setName(string $name)
    {
        return $this->setData(self::NAME, $name);
    }

    /**
     * Get bio
     *
     * @return string|null
     */
    public function getBio()
    {
        return $this->getData(self::BIO);
    }

    /**
     * Set bio
     *
     * @param string|null $bio
     * @return $this
     */
    public function setBio(?string $bio)
    {
        return $this->setData(self::BIO, $bio);
    }

    /**
     * Get contents
     *
     * @return string|null
     */
    public function getContents()
    {
        return $this->getData(self::CONTENTS);
    }

    /**
     * Set contents
     *
     * @param string|null $contents
     * @return $this
     */
    public function setContents(?string $contents)
    {
        return $this->setData(self::CONTENTS, $contents);
    }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return $this
     */
    public function setCreationTime($creationTime)
    {
        return $this->setData(self::CREATION_TIME, $creationTime);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return $this
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Before delete hook to prevent deletion if author has books
     *
     * @return $this
     * @throws LocalizedException
     */
    public function beforeDelete()
    {
        $bookCollection = $this->bookCollectionFactory->create()
            ->addFieldToFilter('author_id', $this->getId());

        if ($bookCollection->getSize() > 0) {
            throw new LocalizedException(
                __('Cannot delete this author: it is assigned to one or more books.')
            );
        }

        return parent::beforeDelete();
    }
}
