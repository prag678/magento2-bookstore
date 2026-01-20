<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 *
 * SaveAndContinueButton Block
 */
declare(strict_types=1);

namespace Magediary\Bookstore\Block\Adminhtml\Book\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveAndContinueButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * Get data for Save and Continue Edit button
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save and Continue Edit'),
            'class' => 'save',
            'data_attribute' => [
                'mage-init' => [
                    'button' => ['event' => 'saveAndContinueEdit'],
                ],
            ],
            'sort_order' => 80,
        ];
    }
}
