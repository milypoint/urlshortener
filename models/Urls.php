<?php

namespace app\models;

use app\helpers\UrlShortenerHelper;
use app\models\queries\UrlsQuery;
use yii\db\ActiveRecord;
use yii\helpers\Url;

/**
 * This is the model class for table "urls".
 *
 * @property string|null $url
 */
class Urls extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'urls';
    }

    /**
     * {@inheritdoc}
     */
    public function fields()
    {
        return [
            'code' => function (Urls $model) {
                return Url::to([
                    'urls/view',
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
        return new UrlsQuery(get_called_class());
    }
}
