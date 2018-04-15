<?php
/**
 * CustomerSave
 *
 * @copyright Copyright © 2018 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace RedboxDigital\Linkedin\Observer;

use Magento\Customer\Model\Customer;
use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;

class CustomerSave implements ObserverInterface
{
    /** @var Customer */
    protected $customer;

    /**
     * CustomerSave constructor.
     * @param Customer $customer
     */
    public function __construct(
        Customer $customer
    ) {
        $this->customer = $customer;
    }

    /**
     * @param Observer $observer
     * @return bool|void
     * @throws \Exception
     */
    public function execute(Observer $observer)
    {
        $customer = $observer->getCustomer();

        $linkedInValue = $customer->getCustomAttribute('linkedin_profile')->getValue();

        $customerCollection = $this->getCustomerCollection();
        foreach ($customerCollection as $customerCol) {
            $c = $this->customer->load($customerCol->getEntityId());

            if ($linkedInValue == $c->getLinkedinProfile()
                && $customerCol->getEntityId() != $customer->getId()
            ) {
                throw new \Exception(__('Linked In Profile Already Exists!'));
            }
        }

        return false;
    }

    /**
     * @return mixed
     */
    protected function getCustomerCollection()
    {
        return $this->customer->getCollection()
            ->addAttributeToSelect('*')
            ->load();
    }
}
