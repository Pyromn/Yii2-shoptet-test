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

    public function syncProducts(): void
    {
        $productList = $this->api->getProducts();

        foreach ($productList['data']['products'] as $item) {
            $guid = $item['guid'];
            $product = $this->api->getProductDetail($guid/*, ['include' => 'variants']*/);

            /*foreach ($product['data']['variants'] as $variant) {
                $code = $variant['code'];

                $productVariant = $this->api->getProductDetailByCode($code);
            }*/

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

    public function updateProduct(string $code): void
    {
        $params = [
            'data' => [
                // update short description
                'shortDescription' => 'Všetko, čo potrebuješ, aby si mal vercajch v kľude ‑ pri športe, v kancli aj doma pri guleváloši. V tomto sete nájdeš starý dobrý Antistick a Antisweat, plus trenky s technológiou Balls Holder. Čože? Áno, proste gule podržia. Sú vybavené spešl priehradkou, kam si môžeš svoje gulaté „nádobíčko“ nasúkať a držať ho ďaleko od stehien, ku ktorým sa tak rado priliepa.',
            ]
        ];

        $this->api->updateProductDetailByCode($code, $params);
    }
}