<?php
namespace Magediary\Bookstore\Model\Author\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Magediary\Bookstore\Model\ResourceModel\Author\CollectionFactory;

/**
 * Source model for Author dropdown
 */
class AuthorList implements OptionSourceInterface
{
    /**
     * @var CollectionFactory
     */
    protected $collectionFactory;

    /**
     * AuthorList constructor.
     *
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(CollectionFactory $collectionFactory)
    {
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * Get options array for authors
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options = [['value' => '', 'label' => __('-- Please Select --')]];

        $collection = $this->collectionFactory->create();
        $collection->setOrder('name', 'ASC');

        foreach ($collection as $author) {
            $options[] = [
                'value' => $author->getId(),
                'label' => $author->getName()
            ];
        }

        return $options;
    }
}
