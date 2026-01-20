<?php
namespace Magediary\Bookstore\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

/**
 * Resource model for Book entity
 */
class Book extends AbstractDb
{
    /**
     * Initialize resource model
     */
    protected function _construct()
    {
        $this->_init('magediary_books', 'book_id');
    }
}
