<?php
namespace Magediary\Bookstore\Model\ResourceModel\Book;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Book Collection
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'book_id';

    /**
     * Define model and resource model
     */
    protected function _construct()
    {
        $this->_init(
            \Magediary\Bookstore\Model\Book::class,
            \Magediary\Bookstore\Model\ResourceModel\Book::class
        );
    }

    /**
     * Join author table to fetch author name in collection
     *
     * @return $this
     */
    public function addAuthorJoin()
    {
        $this->getSelect()->joinLeft(
            ['author_table' => $this->getTable('magediary_authors')],
            'main_table.author_id = author_table.author_id',
            ['author_name' => 'author_table.name']
        );
        $this->_map['fields']['author_name'] = 'author_table.name';
        return $this;
    }
}
