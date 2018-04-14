<?php
/**
 * VisibleType
 *
 * @copyright Copyright © 2018 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace RedboxDigital\Linkedin\Model\Source;


use Magento\Framework\Option\ArrayInterface;

class VisibleType implements ArrayInterface
{

    /**
     * Return array of options as value-label pairs
     *
     * @return array Format: array(array('value' => '<value>', 'label' => '<label>'), ...)
     */
    public function toOptionArray()
    {
        return [
            [
                'value' => 0,
                'label' => __('Invisible')
            ],
            [
                'value' => 1,
                'label' => __('Required')
            ],
            [
                'value' => 2,
                'label' => __('Optional')
            ]
        ];
    }
}