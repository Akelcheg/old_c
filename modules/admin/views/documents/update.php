<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Documents */

$this->title = 'Update Documents: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Documents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div id="content">

    <?php echo $this->render('/layouts/partials/h1', array('title' => 'Редактирование Документа', 'icon' => 'print'));
    echo $this->render('/layouts/partials/jarviswidget', array(
        'class' => 'jarviswidget-color-blue',
        'header' =>
            $this->render('/layouts/partials/jarviswidget/title', array(
                'title' => 'Редактирование документа'
            ), true),
        'control' => $this->render('/layouts/partials/jarviswidget/control', [], true),
        'content' => $this->render('_form', ['model' => $model,
            'imagesArray' => $imagesArray], true)
    ));
    ?>
</div>
