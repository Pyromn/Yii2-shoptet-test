<?php

namespace frontend\components;

use Yii;
use yii\helpers\Json;
use yii\helpers\VarDumper;

class ShoptetApi
{
    const ESHOP = 'eshop';
    const PRODUCTS = 'products';

    public function __construct()
    {
        return $this->call(self::ESHOP);
    }

    public function getProducts()
    {
        return $this->call(self::PRODUCTS);
    }

    public function getProductDetail(string $code)
    {
        return $this->call(self::PRODUCTS . '/' . $code);
    }

    public function updateProductData(array $params)
    {
        return $this->call(self::PRODUCTS, $params, 'POST');
    }

    private function call(string $action, array $params = [], string $method = 'GET')
    {
        $curl = Yii::$app->params['url'] . $action;
        $data = http_build_query($params);
        $options = [
            'http' => [
                'method' => $method,
                'header'=> [
                    "Accept: application/json",
                    "Content-Type: application/vnd.shoptet.v1.0",
                    "Shoptet-Private-API-Token: " . Yii::$app->params['token'],
                ],
                'content' => $data,
            ]
        ];

        $context = stream_context_create($options);

        return Json::decode(file_get_contents($curl, false, $context));
    }
}