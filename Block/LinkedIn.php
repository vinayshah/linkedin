<?php
/**
 * LinkedIn
 *
 * @copyright Copyright © 2018 Staempfli AG. All rights reserved.
 * @author    juan.alonso@staempfli.com
 */

namespace RedboxDigital\Linkedin\Block;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;

class LinkedIn extends \Magento\Framework\View\Element\Template
{
    /** @var ScopeConfigInterface */
    private $scopeConfig;

    /** @var Session */
    private $customerSession;

    /**
     * LinkedIn constructor.
     * @param Template\Context $context
     * @param ScopeConfigInterface $scopeConfig
     * @param Session $customerSession
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        ScopeConfigInterface $scopeConfig,
        Session $customerSession,
        array $data = []
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->customerSession = $customerSession;
        parent::__construct($context, $data);
    }

    public function getConfigValue($path, $scope = ScopeInterface::SCOPE_STORE)
    {
        return $this->scopeConfig->getValue($path, $scope);
    }

    public function getLinkedinProfile()
    {
        return $this->getCustomer()->getLinkedinProfile();
    }

    public function getCustomer()
    {
        return $this->customerSession->getCustomer();
    }
}
