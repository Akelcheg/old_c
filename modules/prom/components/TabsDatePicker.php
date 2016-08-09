<?php
namespace app\modules\prom\components;

use Yii;
use yii\bootstrap\Tabs;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;

class TabsDatePicker extends \yii\base\Widget
{

    public $beginDate = "2010-01-01";
    public $date;
    public $mode = "day";
    public $classY;
    public $classM;
    public $func=false;
    public $item = false;


    public function init()
    {

        $this->date = date("Y-m-d");
        parent::init(); // TODO: Change the autogenerated stub
    }

    public function run()
    {

        echo Tabs::widget(['items' => $this->YearTabs()]);

    }

    private function YearTabs()
    {
        $active=false;
        $dtBegin = new \DateTime($this->beginDate);

        $dtEnd = new\DateTime($this->date);
        $dInterval = $dtEnd->diff($dtBegin);
        $items = [];



        for ($j = 0; $dtBegin <= $dtEnd; $j++) {

           if(date('Y')==$dtBegin->format('Y')){ $month=date('m');$active=true;}else{$month=12;}
            $items[] = [
                'label' => $dtBegin->format('Y'),
                'active'=>$active,
                'headerOptions' => [
                    'class' => $this->classY,
                    'date' => $dtBegin->format('Y'),
                    'dateM' => $month,
                ],
                'content' => $this->MonthTabs($dtBegin, $dtEnd)
            ];
            if ($this->mode == "month") {
                $dtBegin->add(new \DateInterval('P1Y'));
            }

        }

        return $items;

    }

    private function MonthTabs($dtBegin, $dtEnd)
    {
        if(!$this->func or ($this->func!=0)) {

            //Yii::$app->formatter->locale = 'ru_RU';
            mb_internal_encoding("UTF-8");


            $year = $dtBegin->format('Y');
            $items = [];


            if ($this->mode == "day") {
                $items = [];
                $active = false;
                if (date("Y") == $dtBegin->format("Y")) {
                    for ($i = 0; $dtBegin->format("Y-m") <= $dtEnd->format("Y-m"); $i++) {

                        if (date("m") == $dtBegin->format("m")) {
                            $active = true;
                        }

                        //Yii::$app->formatter->locale = 'ru_RU';
                        $items[] = [
                            'label' => $this->mb_ucfirst(Yii::$app->formatter->asDatetime($dtBegin, 'LLLL')),//strftime ("%B",$dtBegin->getTimestamp()),
                            'content' => '',
                            'active' => $active,
                            'headerOptions' => [
                                'class' => $this->classM,
                                'date' => $dtBegin->format('Y'),
                                'dateM' => $dtBegin->format('m'),

                            ]];

                        $dtBegin->add(new \DateInterval('P1M'));

                    }
                } else {

                    for ($i = 0; $year == $dtBegin->format('Y'); $i++) {

                        if ($dtBegin->format('n') == 12) {
                            $active = true;
                        }

                        $items[] = [
                            'label' => $this->mb_ucfirst(Yii::$app->formatter->asDate($dtBegin->getTimestamp(), 'LLLL')),
                            'content' => '',
                            'active' => $active,
                            'headerOptions' => [
                                'class' => $this->classM,
                                'date' => $dtBegin->format('Y'),
                                'dateM' => $dtBegin->format('m'),
                            ]];

                        $dtBegin->add(new \DateInterval('P1M'));
                    }
                }


            }
            return Tabs::widget(['items' => $items]);
        }
    }

    function mb_ucfirst($text) {
        return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
    }


}