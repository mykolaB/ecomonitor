<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'water-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля помеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'date'); ?>
		<?php //echo $form->textField($model,'date'); ?>
		<?php //echo $form->error($model,'date'); ?>
            <?
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'name' => 'date',
                        'attribute' => 'date',
                        'language' => 'ru',
                        'value'=>  $model->isNewRecord ? date('d.m.Y') : date('d.m.Y', $model->date),
                        'options' => array(
                            'showAnim' => 'slideDown',
                        ),
                        'htmlOptions' => array(
                            'class' => 'datepicker',
                        ),
                    ));
            ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'marker_id'); ?>
		<?php echo $form->textField($model,'marker_id'); ?>
		<?php echo $form->error($model,'marker_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'temp'); ?>
		<?php echo $form->textField($model,'temp'); ?>
		<?php echo $form->error($model,'temp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'iron'); ?>
		<?php echo $form->textField($model,'iron'); ?>
		<?php echo $form->error($model,'iron'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'calcium'); ?>
		<?php echo $form->textField($model,'calcium'); ?>
		<?php echo $form->error($model,'calcium'); ?>
	</div>

	<?php if (!Yii::app()->request->isAjaxRequest): ?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>
	
	<?php else: ?>
	<div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
		<div class="ui-dialog-buttonset">
		<?php			$this->widget('zii.widgets.jui.CJuiButton', array(
				'name'=>'submit_'.rand(),
				'caption'=>$model->isNewRecord ? 'Создать' : 'Сохранить',
				'htmlOptions'=>array(
					'ajax' => array(
						'url'=>$model->isNewRecord ? $this->createUrl('create') : $this->createUrl('update', array('id'=>$model->id)),
						'type'=>'post',
						'data'=>'js:jQuery(this).parents("form").serialize()',
						'success'=>'function(r){
							if(r=="success"){
								window.location.reload();
							}
							else{
								$("#DialogCRUDForm").html(r).dialog("option", "title", "'.($model->isNewRecord ? 'Create' : 'Update').' Water").dialog("open"); return false;
							}
						}', 
					),
				),
			));
		?>
		</div>
	</div>
	<?php endif; ?>

<?php $this->endWidget(); ?>

</div><!-- form -->