<?php

namespace Cblink\Service\OpenApi;

use Cblink\Service\OpenApi\Kennel\ServiceContainer;

/**
 * Class OpenApi
 * @package Cblink\Service\OpenApi
 * @property-read Payment\Client $payment   支付服务
 */
class OpenApi extends ServiceContainer
{
    /**
     * @var array
     */
    protected $providers = [
        Payment\ServiceProvider::class,
    ];
}