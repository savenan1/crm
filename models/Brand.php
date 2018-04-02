<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "brand".
 *
 * @property integer $Id
 * @property string $Brand_name
 * @property string $Brand_icon
 */
class Brand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Brand_name'], 'required'],
            [['Brand_name'], 'string', 'max' => 100],
            [['Brand_icon'], 'string', 'max' => 1000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Brand_name' => 'Brand Name',
            'Brand_icon' => 'Brand Icon',
        ];
    }
}
