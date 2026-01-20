<?php
/**
 * Book Model
 *
 * @category  Magediary
 * @package   Magediary_Bookstore
 */

namespace Magediary\Bookstore\Model;

use Magento\Framework\Model\AbstractModel;
use Magediary\Bookstore\Api\Data\BookInterface;

/**
 * Class Book
 *
 * Represents a Book entity in the Magediary Bookstore module.
 */
class Book extends AbstractModel implements BookInterface
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Magediary\Bookstore\Model\ResourceModel\Book::class);
    }

    /**
     * Get book ID
     *
     * @return int|null
     */
    public function getBookId()
    {
        return $this->getData(self::BOOK_ID);
    }

    /**
     * Set book ID
     *
     * @param int $bookId
     * @return $this
     */
    public function setBookId(int $bookId)
    {
        return $this->setData(self::BOOK_ID, $bookId);
    }

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Set title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle(string $title)
    {
        return $this->setData(self::TITLE, $title);
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
     * Get description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->getData(self::DESCRIPTION);
    }

    /**
     * Set description
     *
     * @param string|null $description
     * @return $this
     */
    public function setDescription(?string $description)
    {
        return $this->setData(self::DESCRIPTION, $description);
    }

    /**
     * Get published year
     *
     * @return int|null
     */
    public function getPublishedYear()
    {
        return $this->getData(self::PUBLISHED_YEAR);
    }

    /**
     * Set published year
     *
     * @param int|null $year
     * @return $this
     */
    public function setPublishedYear(?int $year)
    {
        return $this->setData(self::PUBLISHED_YEAR, $year);
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
}
