<?php
declare(strict_types=1);

namespace Magediary\Bookstore\Api\Data;

interface BookInterface
{
    public const BOOK_ID = 'book_id';

    public const TITLE = 'title';
    public const AUTHOR_ID = 'author_id';

    public const DESCRIPTION = 'description';
    public const PUBLISHED_YEAR = 'published_year';
    public const CONTENTS = 'contents';

    public const CREATION_TIME = 'creation_time';

    public const UPDATE_TIME   = 'update_time';

    /**
     * Get book_id
     *
     * @return int|null
     */
    public function getBookId();

    /**
     * Set book_id
     *
     * @param int $bookId
     * @return \Magediary\Bookstore\Api\Data\BookInterface
     */
    public function setBookId(int $bookId);

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     *
     * @param string $title
     * @return \Magediary\Bookstore\Api\Data\BookInterface
     */
    public function setTitle(string $title);

    /**
     * Get author_id
     *
     * @return int|null
     */
    public function getAuthorId();

    /**
     * Set author_id
     *
     * @param int $authorId
     * @return \Magediary\Bookstore\Api\Data\BookInterface
     */
    public function setAuthorId(int $authorId);

    /**
     * Get description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Set description
     *
     * @param string|null $description
     * @return \Magediary\Bookstore\Api\Data\BookInterface
     */
    public function setDescription(?string $description);

    /**
     * Get published_year
     *
     * @return int|null
     */
    public function getPublishedYear();

    /**
     * Set published_year
     *
     * @param int|null $year
     * @return \Magediary\Bookstore\Api\Data\BookInterface
     */
    public function setPublishedYear(?int $year);

    /**
     * Get contents
     *
     * @return string|null
     */
    public function getContents();

    /**
     * Set contents
     *
     * @param string $contents
     * @return \Magediary\Bookstore\Api\Data\AuthorInterface
     */
    public function setContents(?string $contents);

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Set creation time
     *
     * @param string|null $creationTime
     * @return \Magediary\Bookstore\Api\Data\BookInterface
     */
    public function setCreationTime(?string $creationTime);

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Set update time
     *
     * @param string|null $updateTime
     * @return \Magediary\Bookstore\Api\Data\BookInterface
     */
    public function setUpdateTime(?string $updateTime);
}
