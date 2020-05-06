<?php

namespace app\models;

use app\helpers\UrlShortenerHelper;
use app\models\queries\UrlQuery;
use yii\db\ActiveRecord;
use yii\helpers\Url as UrlHelper;

/**
 * This is the model class for table "urls".
 *
 * @property string|null $url
 */
class Url extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'url';
    }

    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        return [
            'code' => function (Url $model) {
                return UrlHelper::to([
                    'url/view',
                    'code' => UrlShortenerHelper::idToCode($model->primaryKey)
                ], true);
            }
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url'], 'trim'],
            [['url'], 'required'],
            [['url'], 'url'],
        ];
    }

    public static function find()
    {
        return new UrlQuery(get_called_class());
    }
}
