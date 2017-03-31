<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<p>Inicia sesión para acceder a la plataforma</p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

        <?php // echo $form->errorSummary($model); ?>
	<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'username2'); ?>
		<?php echo $form->textField($model,'username', array('class'=>'form-control uname')); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password', array('class'=>'form-control pword')); ?>
		<?php echo $form->error($model,'password'); ?>		
	</div>

<!--	<div class="row rememberMe">
		<?php // echo $form->checkBox($model,'rememberMe'); ?>
		<?php // echo $form->label($model,'rememberMe'); ?>
		<?php // echo $form->error($model,'rememberMe'); ?>
	</div>-->

        <div class="mb20"></div>
	<div class="row">
		<?php echo CHtml::submitButton('Ingresar', array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->


<?php if(Yii::app()->user->hasFlash('formResponsable')):?> 
<script>
 $(document).ready(function(){
      $('#formResponsable').modal('show');
 });    
</script>
<?php endif; ?>

<div class="modal fade" id="formResponsable" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog" style="width:430px;">
        <div class="modal-content">
            <div class="modal-header">        
                <h4 class="modal-title" id="myModalLabel">Responsable</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-bordered" style="padding: 0px;">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Identificación:</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="Identificación" id="txtIdentificacion">
                        </div>
                    </div>    
                </form>          
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnValidarIdentificacion">Validar Identificación</button> 
                <button type="button" class="btn btn-default" id="btnReset">Cancelar</button>  
            </div>
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
