<?php $this->beginContent('//patient/event_container'); ?>

<h2 class="event-title"><?php echo $this->event_type->name ?></h2>

	<?php
	$form = $this->beginWidget('BaseEventTypeCActiveForm', array(
			'id'=>'clinical-create',
			'enableAjaxValidation'=>false,
			'htmlOptions' => array('class'=>'sliding'),
			'focus'=>'#procedure_id'
		));
	?>
	<?php  $this->displayErrors($errors)?>
	<?php  $this->renderDefaultElements($this->action->id, $form); ?>
	<?php  $this->renderOptionalElements($this->action->id, $form); ?>
	<?php  $this->displayErrors($errors)?>
	<?php $this->event_actions[] = EventAction::button('Save', 'save', array('level' => 'secondary'), array('class' => 'button small', 'form'=>'clinical-create'));?>
	<?php  $this->endWidget(); ?>


<?php $this->endContent() ;?>
