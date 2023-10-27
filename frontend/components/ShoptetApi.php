<?php

namespace frontend\components;

use Yii;
use yii\helpers\Json;
use yii\helpers\VarDumper;

class ShoptetApi
{
    const ESHOP = 'eshop';
    const PRODUCTS = 'products';

    public function getShopInfo()
    {
        return $this->call(self::ESHOP);
    }

    public function getProducts(): array
    {
        return $this->call(self::PRODUCTS);
    }

    public function getProductDetail(string $guid, array $params = []): array
    {
        return $this->call(self::PRODUCTS . '/' . $guid, $params);
    }

    public function getProductDetailByCode(string $code, array $params = []): array
    {
        return $this->call(self::PRODUCTS . '/code/' . $code, $params);
    }

    public function updateProductDetailByCode(string $code, array $params): array
    {
        return $this->call(self::PRODUCTS . '/code/' . $code, $params, 'PATCH');
    }

    private function call(string $action, array $params = [], string $method = 'GET'): array
    {
        $curl = Yii::$app->params['url'] . $action;

        if (! empty($params)) {
            if ($method === 'GET') {
                $curl = $curl . '?' . http_build_query($params);
            } elseif ($method === 'POST') {
                $params = http_build_query($params);
            } else {
                $params = Json::encode($params);
            }
        }

        $options = [
            'http' => [
                'method' => $method,
                'header'=> [
                    "Content-Type: application/vnd.shoptet.v1.0",
                    "Shoptet-Private-API-Token: " . Yii::$app->params['token'],
                ],
                'content' => $params,
            ]
        ];

        $context = stream_context_create($options);

        return Json::decode(file_get_contents($curl, false, $context));
    }
}