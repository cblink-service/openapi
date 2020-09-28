<?php

namespace Cblink\Service\OpenApi\Payment;

use Cblink\Service\OpenApi\AbstractApi;

class Client extends AbstractApi
{
    /**
     * 应用列表
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function apps(array $params = [])
    {
        return $this->get('manage/app', $params);
    }

    /**
     * 应用详情
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function app(array $params = [])
    {
        return $this->get('manage/app/%s', $params);
    }

    /**
     * 新建应用
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function storeApp(array $params = [])
    {
        return $this->post('manage/app', $params);
    }

    /**
     * 修改应用
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function putApp(array $params = [])
    {
        return $this->put('manage/app/%s', $params);
    }

    /**
     * 删除应用
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function deleteApp(array $params = [])
    {
        return $this->delete('manage/app/%s', $params);
    }

    /**
     * 订单列表
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function orders(array $params = [])
    {
        return $this->get('manage/order');
    }

    /**
     * 订单详情
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function order(array $params = [])
    {
        return $this->get('manage/order/%s');
    }

    /**
     * 获取订单
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function orderResponse(array $params = [])
    {
        return $this->get('manage/order/%s/response');
    }

    /**
     * 订单参数信息
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function orderExtra(array $params = [])
    {
        return $this->get('manage/order/%s/extra');
    }

    /**
     * 退款列表
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refunds(array $params = [])
    {
        return $this->get('manage/refund');
    }

    /**
     * 退款详情
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refund(array $params = [])
    {
        return $this->get('manage/refund/%s');
    }

    /**
     * 退单原始返回信息
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refundResponse(array $params = [])
    {
        return $this->get('manage/refund/%s/response');
    }

    /**
     * 退单原始请求参数
     *
     * @param array $params
     * @return \Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function refundExtra(array $params = [])
    {
        return $this->get('manage/refund/%s/extra');
    }

    /**
     * @return string
     */
    protected function getModuleName(): string
    {
        return 'payment';
    }
}