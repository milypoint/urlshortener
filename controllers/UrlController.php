<?php

namespace app\controllers;

use app\helpers\UrlShortenerHelper;
use app\models\Url;
use Yii;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class UrlController extends ActiveController
{
    /**
     * {@inheritdoc}
     */
    public $modelClass = Url::class;

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'options' => [
                'class' => 'yii\rest\OptionsAction',
            ],
        ];
    }

    /**
     * @return Url
     */
    public function actionCreate(): Url
    {
        $postData = Yii::$app->request->post('url');
        $model = Url::find()
            ->byUrl($postData)
            ->one()
        ;
        if ($model === null) {
            $model = new Url();
            $model->url = $postData;
            $model->save();
        }
        return $model;
    }

    /**
     * @param string $code
     * @return Response
     * @throws NotFoundHttpException
     */
    public function actionView($code): Response
    {
        $model = Url::findOne(UrlShortenerHelper::codeToId($code));
        if ($model === null) {
            throw new NotFoundHttpException;
        }
        return $this->redirect($model->url);
    }
}
