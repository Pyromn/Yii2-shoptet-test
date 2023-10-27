<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_variant".
 *
 * @property int $id
 * @property string $guid
 * @property string $code
 * @property string|null $ean
 * @property float|null $stock
 * @property string|null $unit
 * @property float|null $weight
 * @property float|null $width
 * @property float|null $height
 * @property float|null $depth
 * @property int|null $visible
 * @property float|null $minStockSupply
 * @property string|null $negativeStockAllowed
 * @property int|null $amountDecimalPlaces
 * @property float|null $price
 * @property int|null $includingVat
 * @property float|null $vatRate
 * @property string|null $currencyCode
 * @property float|null $actionPrice
 * @property float|null $commonPrice
 * @property string|null $manufacturerCode
 * @property string|null $pluCode
 * @property string|null $isbn
 * @property string|null $serialNo
 * @property string|null $mpn
 * @property string|null $heurekaCPC
 * @property int|null $atypicalBilling
 * @property int|null $atypicalShipping
 * @property string|null $availability
 * @property string|null $availabilityWhenSoldOut
 * @property string|null $zboziCZ
 *
 * @property Product $gu
 */
class ProductVariant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_variant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['guid', 'code'], 'required'],
            [['stock', 'weight', 'width', 'height', 'depth', 'minStockSupply', 'price', 'vatRate', 'actionPrice', 'commonPrice'], 'number'],
            [['visible', 'amountDecimalPlaces', 'includingVat', 'atypicalBilling', 'atypicalShipping'], 'integer'],
            [['availability', 'availabilityWhenSoldOut', 'zboziCZ'], 'safe'],
            [['guid', 'code', 'ean', 'unit', 'negativeStockAllowed', 'currencyCode', 'manufacturerCode', 'pluCode', 'isbn', 'serialNo', 'mpn', 'heurekaCPC'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['guid', 'code'], 'unique', 'targetAttribute' => ['guid', 'code']],
            [['guid'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['guid' => 'guid']],
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
            'code' => 'Code',
            'ean' => 'Ean',
            'stock' => 'Stock',
            'unit' => 'Unit',
            'weight' => 'Weight',
            'width' => 'Width',
            'height' => 'Height',
            'depth' => 'Depth',
            'visible' => 'Visible',
            'minStockSupply' => 'Min Stock Supply',
            'negativeStockAllowed' => 'Negative Stock Allowed',
            'amountDecimalPlaces' => 'Amount Decimal Places',
            'price' => 'Price',
            'includingVat' => 'Including Vat',
            'vatRate' => 'Vat Rate',
            'currencyCode' => 'Currency Code',
            'actionPrice' => 'Action Price',
            'commonPrice' => 'Common Price',
            'manufacturerCode' => 'Manufacturer Code',
            'pluCode' => 'Plu Code',
            'isbn' => 'Isbn',
            'serialNo' => 'Serial No',
            'mpn' => 'Mpn',
            'heurekaCPC' => 'Heureka Cpc',
            'atypicalBilling' => 'Atypical Billing',
            'atypicalShipping' => 'Atypical Shipping',
            'availability' => 'Availability',
            'availabilityWhenSoldOut' => 'Availability When Sold Out',
            'zboziCZ' => 'Zbozi Cz',
        ];
    }

    /**
     * Gets query for [[Gu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGu()
    {
        return $this->hasOne(Product::class, ['guid' => 'guid']);
    }
}
