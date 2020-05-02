<?php

namespace app\controllers;

use app\helpers\UrlShortenerHelper;
use app\models\Urls;
use Yii;
use yii\rest\ActiveController;
use yii\web\NotFoundHttpException;
use yii\web\Response;

class UrlsController extends ActiveController
{
    /**
     * {@inheritdoc}
     */
    public $modelClass = Urls::class;

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
     * @return Urls
     */
    public function actionCreate(): Urls
    {
        $postData = Yii::$app->request->post('url');
        $model = Urls::find()
            ->byUrl($postData)
            ->one()
        ;
        if ($model === null) {
            $model = new Urls();
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
        $model = Urls::findOne(UrlShortenerHelper::codeToId($code));
        if ($model === null) {
            throw new NotFoundHttpException;
        }
        return $this->redirect($model->url);
    }
}
