<?php
namespace Magediary\Bookstore\Block\Widget;

use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;
use Magediary\Bookstore\Model\ResourceModel\Book\CollectionFactory;

class Books extends Template implements BlockInterface
{
     protected $_template = 'Magediary_Bookstore::widget/books.phtml';

    protected $bookCollectionFactory;

    public function __construct(
        Template\Context $context,
        CollectionFactory $bookCollectionFactory,
        array $data = []
    ) {
        $this->bookCollectionFactory = $bookCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getBooks()
    {
        return $this->bookCollectionFactory->create();
    }

    public function getBooksPerSlide()
    {
        return $this->getData('books_per_slide') ?: 3;
    }
}
