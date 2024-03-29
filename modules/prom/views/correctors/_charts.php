<?php
/**
 * Created by PhpStorm.
 * User: alexey
 * Date: 02.03.16
 * Time: 12:08
 */

use yii\bootstrap\Tabs;

echo Tabs::widget([

            'items' => [
                [
                    'label' => Yii::t('prom','Daily'),//,'Cуточный',
                   // 'content' =>'В разработке'
                    'content' =>'',
                    'headerOptions' => [
                        'id'=>'dayMode'
                    ],

                ],
                [
                    'label' => Yii::t('prom','Weekly'),//,'Недельный',
                    'content' =>'',
                    'headerOptions' => [
                        'id'=>'weekMode'
                    ],
                ],
                [
                    'label' => Yii::t('prom','Monthly'),//'Месячный',
                    'content' =>'',
                    'headerOptions' => [
                        'id'=>'monthMode'
                    ],
                ],
                [
                    'label' => '',
                    'content' =>'',
                    'headerOptions' => [
                        'id'=>'chartsUl'
                    ],
                ],
            ],

]);
?>

<div id="chartBody" style="width:100%;float: left;">
<?php echo\app\components\ChartProm::widget([
    'name' => 'Prom',
    'height' => '220px',
    'width' => '100%',
    'charttype'=>'day',
    'id'=>$id,
    'event'=>'shown.bs.tab',
    'anchor'=>"'a[href=#chart]'",
    //'global' => $globalChartSettings,
    'chartsConfig' => [
        'bezierCurve' => 'false',
        'scaleBeginAtZero'=>'false',
        'animation'=>'false'
    ],
]); ?>

</div>


