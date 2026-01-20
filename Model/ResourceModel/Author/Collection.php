<?php
namespace Magediary\Bookstore\Model\ResourceModel\Author;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Author Collection
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'author_id';

    /**
     * Define model and resource model
     */
    protected function _construct()
    {
        $this->_init(
            \Magediary\Bookstore\Model\Author::class,
            \Magediary\Bookstore\Model\ResourceModel\Author::class
        );
    }
}
