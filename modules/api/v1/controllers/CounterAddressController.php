<?php

namespace app\modules\api\v1\controllers;

use yii\rest\Controller;

class CounterAddressController extends Controller
{

    public $modelClass = 'app\modules\api\v1\models\CounterAddress';

    public function actions()
    {
        $actions = parent::actions();

        $actions['index'] = [
            'class'       => 'app\modules\api\v1\actions\SearchAction',
            'modelClass'  => $this->modelClass,
        ];

        $actions['view'] = [
            'class' => 'yii\rest\ViewAction',
            'modelClass'  => $this->modelClass,
        ];

        $actions['create'] = [
            'class' => 'yii\rest\CreateAction',
            'modelClass'  => $this->modelClass,
        ];

        $actions['update'] = [
            'class' => 'yii\rest\UpdateAction',
            'modelClass'  => $this->modelClass,
        ];

        $actions['options'] = [
            'class' => 'yii\rest\OptionsAction',
            'collectionOptions' => ['GET', 'POST', 'PUT', 'HEAD', 'OPTIONS'],
        ];

        return $actions;
    }

    public function beforeAction($action)
    {
        $headers = \Yii::$app->response->headers;
        $headers->add('Access-Control-Expose-Headers', 'Link,X-Pagination-Current-Page,X-Pagination-Page-Count,X-Pagination-Per-Page,X-Pagination-Total-Count,Content-Type');
        $headers->add('Access-Control-Allow-Headers', 'Link,X-Pagination-Current-Page,X-Pagination-Page-Count,X-Pagination-Per-Page,X-Pagination-Total-Count,Content-Type');
        $headers->add('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, OPTIONS');

        return parent::beforeAction($action); // TODO: Change the autogenerated stub
    }

}