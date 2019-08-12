<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $formModel \app\forms\JobExportForm */
/* @var $form yii\widgets\ActiveForm */

?>
<h1>jobs Export</h1>


<?php $form = ActiveForm::begin(); ?>

<?= $form->field($formModel, 'format') ->dropDownList(['csv'=>'CSV','xml'=>'XML','xml-mini'=>'XML SHot Description'])?>
<?= $form->field($formModel, 'email')->textInput(['maxlength' => true]) ?>

<div class="form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
