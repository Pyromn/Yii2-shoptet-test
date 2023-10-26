<?php

namespace frontend\components;

use Yii;
use yii\helpers\Json;

class ShoptetApi
{
    const ESHOP = 'eshop';
    const PRODUCTS = 'products';

    public function construct()
    {
        return $this->call();
    }

    public function getProducts()
    {
        return $this->call(self::PRODUCTS);
    }

    public function getProductDetail(string $code)
    {
        return $this->call(self::PRODUCTS . '/' . $code);
    }

    private function call(string $action = self::ESHOP, $params = [])
    {
        $curl = Yii::$app->params['url'] . $action;
        $options = [
            'http' => [
                'method' => "GET",
                'header'=> [
                    "Accept: application/json",
                    "Content-Type: application/vnd.shoptet.v1.0",
                    "Shoptet-Private-API-Token: " . Yii::$app->params['token'],
                ]
            ]
        ];

        $context = stream_context_create($options);

        return Json::decode(file_get_contents($curl, false, $context));
    }
}