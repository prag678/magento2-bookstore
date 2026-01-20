<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Magediary\Bookstore\Controller\Adminhtml\Author;

class Delete extends \Magediary\Bookstore\Controller\Adminhtml\Author
{

    /**
     * Delete action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if we know what should be deleted
        $id = $this->getRequest()->getParam('author_id');
        if ($id) {
            try {
                // init model and delete
                $model = $this->_objectManager->create(\Magediary\Bookstore\Model\Author::class);
                $model->load($id);
                $model->delete();
                // display success message
                $this->messageManager->addSuccessMessage(__('You deleted the Author .'));
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // go back to edit form
                return $resultRedirect->setPath('*/*/edit', ['author_id' => $id]);
            }
        }
        // display error message
        $this->messageManager->addErrorMessage(__('We can not find a author to delete.'));
        // go to grid
        return $resultRedirect->setPath('*/*/');
    }
}
