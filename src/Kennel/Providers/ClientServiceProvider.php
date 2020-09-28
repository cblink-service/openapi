<?php

namespace Cblink\Service\OpenApi\Kennel\Providers;

use GuzzleHttp\Client;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class ClientServiceProvider implements ServiceProviderInterface
{

    public function register(Container $pimple)
    {
        $pimple['client'] = function(){
            return new Client();
        };
    }
}