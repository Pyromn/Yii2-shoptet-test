<?php

use yii\db\Migration;

/**
 * Class m231026_122315_create_product_table
 */
class m231027_102115_create_product_variant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product_variant', [
            'id' => $this->primaryKey(),
            'guid' => $this->string()->notNull(),
            'code' => $this->string()->notNull()->unique(),
            'ean' => $this->string(),
            'stock' => $this->float(),
            'unit' => $this->string(),
            'weight' => $this->float(),
            'width' => $this->float(),
            'height' => $this->float(),
            'depth' => $this->float(),
            'visible' => $this->boolean(),
            'minStockSupply' => $this->float(),
            'negativeStockAllowed' => $this->string(),
            'amountDecimalPlaces' => $this->integer(),
            'price' => $this->float(),
            'includingVat' => $this->boolean(),
            'vatRate' => $this->float(),
            'currencyCode' => $this->string(),
            'actionPrice' => $this->float(),
            'commonPrice' => $this->float(),
            'manufacturerCode' => $this->string(),
            'pluCode' => $this->string(),
            'isbn' => $this->string(),
            'serialNo' => $this->string(),
            'mpn' => $this->string(),
            'heurekaCPC' => $this->string(),
            'atypicalBilling' => $this->boolean(),
            'atypicalShipping' => $this->boolean(),
            'availability' => $this->json(),
            'availabilityWhenSoldOut' => $this->json(),
            'zboziCZ' => $this->json(),
        ]);

        $this->createIndex('product_variant_guid_code_index', 'product_variant', ['guid', 'code'], true);
        $this->addForeignKey('product_variant_guid_key', 'product_variant', 'guid', 'product', 'guid');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231026_122315_create_product_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231026_122315_create_table_products cannot be reverted.\n";

        return false;
    }
    */
}
