<?php
/**
 * Account
 *
 * @copyright Copyright © 2018 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace RedboxDigital\Linkedin\Block\Adminhtml\Order\Create\Form;

use Magento\Framework\Api\ExtensibleDataObjectConverter;
use Magento\Framework\Data\Form\Element\AbstractElement;
use Magento\Framework\Pricing\PriceCurrencyInterface;


class Account extends \Magento\Sales\Block\Adminhtml\Order\Create\Form\Account
{
    /**
     * Account constructor.
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Model\Session\Quote $sessionQuote
     * @param \Magento\Sales\Model\AdminOrder\Create $orderCreate
     * @param PriceCurrencyInterface $priceCurrency
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor
     * @param \Magento\Customer\Model\Metadata\FormFactory $metadataFormFactory
     * @param \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository
     * @param ExtensibleDataObjectConverter $extensibleDataObjectConverter
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Model\Session\Quote $sessionQuote,
        \Magento\Sales\Model\AdminOrder\Create $orderCreate,
        PriceCurrencyInterface $priceCurrency,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Framework\Reflection\DataObjectProcessor $dataObjectProcessor,
        \Magento\Customer\Model\Metadata\FormFactory $metadataFormFactory,
        \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
        ExtensibleDataObjectConverter $extensibleDataObjectConverter,
        array $data = []
    ) {
        parent::__construct($context, $sessionQuote, $orderCreate, $priceCurrency, $formFactory, $dataObjectProcessor,
            $metadataFormFactory, $customerRepository, $extensibleDataObjectConverter, $data);
    }

    protected function _addAdditionalFormElementData(AbstractElement $element)
    {
        switch ($element->getId()) {
            case 'email':
                $element->setRequired(0);
                $element->setClass('validate-email admin__control-text');
                break;
            case 'linkedin_profile':
                $element->setRequired(1);
                $element->setClass('validate-length maximum-length-250 admin__control-text');
                break;
        }
        return parent::_addAdditionalFormElementData($element);
    }
}