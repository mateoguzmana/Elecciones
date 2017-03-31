<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle = Yii::app()->name . ' - Login';
$this->breadcrumbs = array(
    'Login',
);
?>

<p style="font-size:1.2em;">Inicia sesión para acceder a la plataforma</p>

<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'login-form',
        'enableClientValidation' => true,
        'clientOptions' => array(
            'validateOnSubmit' => true,
        ),
    ));
    ?>

    <div class="row" style="padding-bottom:10px;">
        <?php echo $form->labelEx($model, 'username', array('style'=>'font-size:1.2em;')); ?>
        <?php $optionsUname = array('class'=>'form-control uname', 'style'=>'font-size:1.5em;'); ?>
        <?php echo $form->textField($model, 'username', $optionsUname); ?>
        <?php echo $form->error($model, 'username'); ?>
    </div>
    <span style="color:red;font-size:1.2em;"><?php echo $form->error($model, 'error'); ?></span>
    <div class="row">
        <?php echo CHtml::submitButton('Ingresar', array('class'=>'btn btn-primary','style'=>'font-size:1.2em;')); ?>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->
