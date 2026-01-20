<?php
namespace Magediary\Bookstore\Ui\Component\Listing\Column;

use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magediary\Bookstore\Model\ResourceModel\Author\CollectionFactory;

/**
 * Class AuthorName
 * Displays the author name instead of author ID in the book grid
 */
class AuthorName extends Column
{
    /**
     * @var CollectionFactory
     */
    protected $authorCollectionFactory;

    /**
     * AuthorName constructor.
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param CollectionFactory $authorCollectionFactory
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        CollectionFactory $authorCollectionFactory,
        array $components = [],
        array $data = []
    ) {
        $this->authorCollectionFactory = $authorCollectionFactory;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Replace author_id with author name in the grid
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (!isset($dataSource['data']['items'])) {
            return $dataSource;
        }

        $authors = $this->authorCollectionFactory->create()->toOptionArray();
        $authorMap = [];

        foreach ($authors as $author) {
            if (!empty($author['value'])) {
                $authorMap[$author['value']] = $author['label'];
            }
        }

        foreach ($dataSource['data']['items'] as &$item) {
            $authorId = $item['author_id'] ?? null;
            $item[$this->getData('name')] = $authorMap[$authorId] ?? __('Unknown');
        }

        return $dataSource;
    }
}
