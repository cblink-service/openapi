<?php

namespace Cblink\Service\OpenApi\Kennel;

use Illuminate\Config\Repository;
use Pimple\Container;

/**
 * Class ServiceContainer
 * @package Cblink\Service\OpenApi\Kennel
 *
 * @property-read Repository $config
 */
class ServiceContainer extends Container
{
    /**
     * @var array
     */
    protected $providers = [];

    public function __construct(array $config)
    {
        $this->loadConfig($config);
        $this->bootstrap();
        parent::__construct();
    }

    /**
     * @param $config
     */
    protected function loadConfig($config)
    {
        $this->offsetSet('config', new Repository($config));
    }

    protected function bootstrap()
    {
        foreach ($this->getProviders() as $provider) {
            $this->register(new $provider());
        }
    }

    /**
     * @return array
     */
    public function getProviders() :array
    {
        return array_merge([
            Providers\ClientServiceProvider::class
        ],$this->providers);
    }

    /**
     * @param $id
     * @param $value
     * @return ServiceContainer
     */
    public function rebind($id, $value)
    {
        $this->offsetSet($id, $value);
        return $this;
    }
}