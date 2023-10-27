<?php

namespace frontend\models;

use app\models\Product;
use frontend\components\ShoptetApi;
use yii\helpers\Json;
use yii\helpers\VarDumper;

class ShoptetSync
{
    private $api;

    public function __construct()
    {
        $this->api = new ShoptetApi();
    }

    public function syncProducts()
    {
        $productList = $this->api->getProducts();

        foreach ($productList['data']['products'] as $item) {
            $guid = $item['guid'];
            $product = $this->api->getProductDetail($guid);

            $model = Product::findOne(['guid' => $guid]) ?? new Product();

            foreach ($product['data'] as $key => $value) {
                if (is_array($value)) {
                    $value = Json::encode($value);
                } elseif (is_bool($value)) {
                    $value = (int) $value;
                }

                $model->setAttribute($key, $value);
            }

            $model->validate();
            //VarDumper::dump($model->getErrors());
            $model->save();
        }
    }

    public function updateProduct($guid)
    {
        $params = [
            'data' => [
                'guid' => $guid,
                'name' => 'Calm Balls boxers XXL',
            ]
        ];

        $this->api->updateProductData($guid, $params);
    }
}