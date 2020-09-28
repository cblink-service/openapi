<?php

namespace Cblink\Service\OpenApi\Payment;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['payment'] = function($pimple){
            return new Client($pimple);
        };
    }
}