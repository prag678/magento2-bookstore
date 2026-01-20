<?php
/**
 * Book List Block
 *
 * @category Magediary
 * @package  Magediary_Bookstore
 */

namespace Magediary\Bookstore\Block\Index;

use Magento\Framework\View\Element\Template;
use Magediary\Bookstore\Model\ResourceModel\Book\CollectionFactory as BookCollectionFactory;
use Magento\Framework\App\RequestInterface;
use Magento\Theme\Block\Html\Pager;

/**
 * Class Books
 *
 * Displays the list of books with optional search and pagination.
 */
class Books extends Template
{
    /**
     * @var BookCollectionFactory
     */
    protected $bookCollectionFactory;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var \Magediary\Bookstore\Model\ResourceModel\Book\Collection|null
     */
    protected $bookCollection;

    /**
     * Books constructor.
     *
     * @param Template\Context $context
     * @param BookCollectionFactory $bookCollectionFactory
     * @param RequestInterface $request
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        BookCollectionFactory $bookCollectionFactory,
        RequestInterface $request,
        array $data = []
    ) {
        $this->bookCollectionFactory = $bookCollectionFactory;
        $this->request = $request;
        parent::__construct($context, $data);
    }

    /**
     * Prepare layout and set pager
     *
     * @return $this
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        if ($this->getBookCollection()) {
            $pager = $this->getLayout()->createBlock(
                Pager::class,
                'magediary.bookstore.pager'
            );
            $pager->setCollection($this->getBookCollection());
            $this->setChild('pager', $pager);
            $this->getBookCollection()->load();
        }

        return $this;
    }

    /**
     * Get book collection with optional search filter
     *
     * @return \Magediary\Bookstore\Model\ResourceModel\Book\Collection
     */
    public function getBookCollection()
    {
        if ($this->bookCollection === null) {
            $collection = $this->bookCollectionFactory->create();
            $collection->addAuthorJoin();
            $collection->setOrder('main_table.title', 'ASC');

            $this->bookCollection = $collection;
        }
        return $this->bookCollection;
    }

    /**
     * Get pager HTML
     *
     * @return string
     */
    public function getPagerHtml()
    {
        return $this->getChildHtml('pager');
    }
}
