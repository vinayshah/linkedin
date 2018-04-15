<?php
/**
 * LayoutProcessor
 *
 * @copyright Copyright © 2018 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace RedboxDigital\Linkedin\Plugin\Checkout;


use RedboxDigital\Linkedin\Helper\Data;

class LayoutProcessor
{
    /**
     * @var Data
     */
    protected $helperData;

    /**
     * LayoutProcessor constructor.
     * @param Data $helperData
     */
    public function __construct(
        Data $helperData
    ) {
        $this->helperData = $helperData;
    }

    /**
     * @param \Magento\Checkout\Block\Checkout\LayoutProcessor $subject
     * @param array $jsLayout
     * @return array
     */
    public function afterProcess(
        \Magento\Checkout\Block\Checkout\LayoutProcessor $subject,
        array $jsLayout
    ) {

        $jsLayout['components']['checkout']['children']['steps']['children']['shipping-step']['children']
        ['shippingAddress']['children']['shipping-address-fieldset']['children']['linkedin_profile'] = [
            'component' => 'Magento_Ui/js/form/element/abstract',
            'config' => [
                'customScope' => 'shippingAddress.linkedin_profile',
                'template' => 'ui/form/field',
                'elementTmpl' => 'ui/form/element/input',
                'id' => 'linkedin-profile'
            ],
            'dataScope' => 'shippingAddress.custom_attributes.linkedin_profile',
            'label' => 'Linkedin Profile',
            'provider' => 'checkoutProvider',
            'visible' => $this->helperData->isVisible(),
            'validation' => [
                'required-entry' => $this->helperData->isRequired(),
                'max_text_length' => '250'
            ],
            'sortOrder' => 250,
            'id' => 'linkedin-profile'
        ];


        return $jsLayout;
    }
}