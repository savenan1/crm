<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product_photo".
 *
 * @property integer $FuiId
 * @property integer $FuiProductId
 * @property string $FstrPhotoUrl
 * @property integer $FuiSequenceNo
 * @property integer $FuiCreateTime
 */
class ProductPhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FuiProductId', 'FuiSequenceNo', 'FuiCreateTime'], 'integer'],
            [['FstrPhotoUrl'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FuiId' => 'Fui ID',
            'FuiProductId' => 'Fui Product ID',
            'FstrPhotoUrl' => 'Fstr Photo Url',
            'FuiSequenceNo' => 'Fui Sequence No',
            'FuiCreateTime' => 'Fui Create Time',
        ];
    }
}
