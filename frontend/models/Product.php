<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $guid
 * @property string $type
 * @property int|null $adult
 * @property string|null $visibility
 * @property string|null $creationTime
 * @property string|null $changeTime
 * @property string|null $shortDescription
 * @property string|null $description
 * @property string|null $metaDescription
 * @property string|null $name
 * @property string|null $metaTitle
 * @property string|null $xmlFeedName
 * @property string|null $additionalName
 * @property string|null $internalNote
 * @property int|null $allowIPlatba
 * @property int|null $allowOnlinePayments
 * @property string|null $sizeIdName
 * @property int|null $voteCount
 * @property float|null $voteAverageScore
 * @property string|null $conditionGrade
 * @property string|null $conditionDescription
 * @property string|null $defaultCategory
 * @property string|null $supplier
 * @property string|null $brand
 * @property string|null $url
 * @property int|null $atypicalBilling
 * @property int|null $atypicalShipping
 * @property string|null $variants
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guid', 'type'], 'required'],
            [['adult', 'allowIPlatba', 'allowOnlinePayments', 'voteCount', 'atypicalBilling', 'atypicalShipping'], 'integer'],
            [['shortDescription', 'description'], 'string'],
            [['voteAverageScore'], 'number'],
            [['defaultCategory', 'variants'], 'safe'],
            [['guid', 'type', 'visibility', 'creationTime', 'changeTime', 'metaDescription', 'name', 'metaTitle', 'xmlFeedName', 'additionalName', 'internalNote', 'sizeIdName', 'conditionGrade', 'conditionDescription', 'supplier', 'brand', 'url'], 'string', 'max' => 255],
            [['guid'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'guid' => 'Guid',
            'type' => 'Type',
            'adult' => 'Adult',
            'visibility' => 'Visibility',
            'creationTime' => 'Creation Time',
            'changeTime' => 'Change Time',
            'shortDescription' => 'Short Description',
            'description' => 'Description',
            'metaDescription' => 'Meta Description',
            'name' => 'Name',
            'metaTitle' => 'Meta Title',
            'xmlFeedName' => 'Xml Feed Name',
            'additionalName' => 'Additional Name',
            'internalNote' => 'Internal Note',
            'allowIPlatba' => 'Allow I Platba',
            'allowOnlinePayments' => 'Allow Online Payments',
            'sizeIdName' => 'Size Id Name',
            'voteCount' => 'Vote Count',
            'voteAverageScore' => 'Vote Average Score',
            'conditionGrade' => 'Condition Grade',
            'conditionDescription' => 'Condition Description',
            'defaultCategory' => 'Default Category',
            'supplier' => 'Supplier',
            'brand' => 'Brand',
            'url' => 'Url',
            'atypicalBilling' => 'Atypical Billing',
            'atypicalShipping' => 'Atypical Shipping',
            'variants' => 'Variants',
        ];
    }
}
