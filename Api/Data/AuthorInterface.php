<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magediary\Bookstore\Api\Data;

interface AuthorInterface
{
    public const AUTHOR_ID = 'author_id';

    public const NAME = 'name';

    public const BIO = 'bio';

    public const CONTENTS = 'contents';

    public const CREATION_TIME = 'creation_time';

    public const UPDATE_TIME   = 'update_time';

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
     * @return \Magediary\Bookstore\Api\Data\AuthorInterface
     */
    public function setAuthorId(int $authorId);

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Set name
     *
     * @param string $name
     * @return \Magediary\Bookstore\Api\Data\AuthorInterface
     */
    public function setName(string $name);

    /**
     * Get bio
     *
     * @return string|null
     */
    public function getBio();

    /**
     * Set bio
     *
     * @param string $bio
     * @return \Magediary\Bookstore\Api\Data\AuthorInterface
     */
    public function setBio(?string $bio);

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
    /**
     * Set contents
     *
     * @param string|null $contents
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
     * @return \Magediary\Bookstore\Api\Data\AuthorInterface
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
     * @return \Magediary\Bookstore\Api\Data\AuthorInterface
     */
    public function setUpdateTime(?string $updateTime);
}
