<?php

use yii\db\Migration;

/**
 * Class m231026_122315_create_product_table
 */
class m231026_122315_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('product', [
            'id' => $this->primaryKey(),
            'guid' => $this->string()->notNull()->unique(),
            'type' => $this->string()->notNull(),
            'adult' => $this->boolean(),
            'visibility' => $this->string(),
            'creationTime' => $this->string(),
            'changeTime' => $this->string(),
            'shortDescription' => $this->text(),
            'description' => $this->text(),
            'metaDescription' => $this->string(),
            'name' => $this->string(),
            'metaTitle' => $this->string(),
            'xmlFeedName' => $this->string(),
            'additionalName' => $this->string(),
            'internalNote' => $this->string(),
            'allowIPlatba' => $this->boolean(),
            'allowOnlinePayments' => $this->boolean(),
            'sizeIdName' => $this->string(),
            'voteCount' => $this->integer(),
            'voteAverageScore' => $this->float(),
            'conditionGrade' => $this->string(),
            'conditionDescription' => $this->string(),
            'defaultCategory' => $this->json(),
            'supplier' => $this->string(),
            'brand' => $this->string(),
            'url' => $this->string(),
            'atypicalBilling' => $this->boolean(),
            'atypicalShipping' => $this->boolean(),
            'variants' => $this->json(),
        ]);
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
