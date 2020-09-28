<?php

namespace Cblink\Service\OpenApi;

use GuzzleHttp\Client;

/**
 * Class AbstractApi
 * @package Cblink\Service\OpenApi
 */
abstract class AbstractApi
{
    /**
     * @var OpenApi
     */
    protected $app;

    /**
     * @var string
     */
    protected $baseUrl;

    public function __construct(OpenApi $app)
    {
        $this->app = $app;
    }

    /**
     * @param $url
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($url, array $query = [])
    {
        return $this->request($url, ['query' => $query]);
    }

    /**
     * @param $url
     * @param array $data
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($url, array $data = [])
    {
        return $this->request($url, ['json' => $data], 'POST');
    }

    /**
     * @param $url
     * @param array $data
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put($url, array $data = [])
    {
        return $this->request($url, ['json' => $data], 'PUT');
    }

    /**
     * @param $url
     * @param array $query
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($url, array $query = [])
    {
        return $this->request($url, ['query' => $query], 'DELETE');
    }

    /**
     * @param $url
     * @param array $options
     * @param string $method
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    protected function request($url,array $options = [], $method = 'GET')
    {
        $options = array_merge([
            'verify' => false,
            'http_errors' => false,
            'timeout' => 5
        ], $options);

        return $this->getHttpClient()->request($method, $this->url($url), $options);
    }

    /**
     * @return Client|mixed
     */
    protected function getHttpClient()
    {
        if ($this->app->offsetExists('http_client')) {
            return $this->app['http_client'];
        }

        return new Client();
    }

    /**
     * @param $uri
     * @return string
     */
    protected function url($uri)
    {
        return sprintf('%s/%s', $this->getBaseUrl(), ltrim($uri, '/'));
    }

    /**
     * @return array|mixed
     */
    public function getBaseUrl()
    {
        return $this->app->config->get(sprintf('urls.%s', $this->getModuleName()), '');
    }

    /**
     * @return string
     */
    abstract protected function getModuleName() :string;

}