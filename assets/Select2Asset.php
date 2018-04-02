<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Created by PhpStorm.
 * User: zhangzenan
 * Date: 2017/10/3
 * Time: 15:14
 */
class Select2Asset extends AssetBundle{

    public $sourcePath = '@common/js';

    public $js = [
        'select2.min.js'
    ];

}