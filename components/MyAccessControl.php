<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use Yii;

use yii\filters\AccessControl;
class MyAccessControl extends AccessControl
{
     protected function denyAccess($user)
    {
        if ($user->getIsGuest()) {
            $user->loginRequired();
        } else {
            echo  Yii::$app->getResponse()->redirect(array('/'));
        }
    }
}