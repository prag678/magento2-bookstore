<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Magediary\Bookstore\Block\Adminhtml\Book\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class SaveButton
 * Provides the configuration for the Save button on the Book edit form.
 */
class SaveButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get Save button data.
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Book'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
        ];
    }
}
