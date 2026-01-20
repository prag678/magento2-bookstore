<?php
namespace Magediary\Bookstore\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Resource model for Author entity
 */
class Author extends AbstractDb
{
    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('magediary_authors', 'author_id');
    }
}
