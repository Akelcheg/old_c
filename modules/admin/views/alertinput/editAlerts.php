
<?php

use yii\helpers\Html;
use app\assets\AdminAppAsset;
use yii\helpers\Url;
use yii\widgets\PjaxAsset;

AdminAppAsset::register($this);
PjaxAsset::register($this);
/* $this->pageTitle = $pageTitle;
  $this->breadcrumbs = array(
  'Administration' => array('administration/index'),
  $pageTitle
  ); */
?>
<div id="content">
<?php

echo $this->render('/layouts/partials/h1', array('title' => 'Лог Предупреждений', 'icon' => 'exclamation-triangle'));
?>


    <section id="widget-grid">
        <div class="row" >
                <?php
                echo $this->render('/layouts/partials/jarviswidget', array(
                    'class' => 'jarviswidget-color-blue',
                    'header' =>
                    $this->render('/layouts/partials/jarviswidget/title', array(
                        'title' => 'редактировать'
                            ), true),
                    'control' => $this->render('/layouts/partials/jarviswidget/control', array(
                        'buttons' => []), true),
                    'content' => $this->render('_editAlerts', [
                        
                        'alerts' => $alert
                            ], true)
                ));
                ?>
        </div>
</div>

</section>
