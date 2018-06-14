<?php
namespace Packagename\Checkout\Model;

use Magento\Checkout\Model\ConfigProviderInterface;

class CustomConfigProvider implements ConfigProviderInterface
{
    public function getConfig()
    {
        $config = [];
        $config['myCustomData'] = 'alcino was here';

        return $config;
    }
}