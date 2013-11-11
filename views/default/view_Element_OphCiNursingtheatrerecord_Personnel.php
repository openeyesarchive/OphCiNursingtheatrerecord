<section class="element">
	<header class="element-header">
		<h3 class="data-title"><?php echo $element->elementType->name ?></h3>
	</header>
	<div class="element-data highlight">
		<div class="row data-row">
			<div class="large-4 column">
				<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('scrub_nurse_id'))?></div>
			</div>
			<div class="large-8 column">
				<div class="data-value"><?php echo $element->o_scrub_nurse ? $element->o_scrub_nurse->fullName : $element->scrub_nurse?></div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-4 column">
				<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('floor_nurse_id'))?></div>
			</div>
			<div class="large-8 column">
				<div class="data-value"><?php echo $element->o_floor_nurse ? $element->o_floor_nurse->fullName : $element->floor_nurse?></div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-4 column">
				<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('accompanying_nurse_id'))?></div>
			</div>
			<div class="large-8 column">
				<div class="data-value"><?php echo $element->o_accompanying_nurse ? $element->o_accompanying_nurse->fullName : $element->accompanying_nurse?></div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-4 column">
				<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('surgeon_id'))?></div>
			</div>
			<div class="large-8 column">
				<div class="data-value"><?php echo $element->o_surgeon ? $element->o_surgeon->fullName : $element->surgeon?></div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-4 column">
				<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('operating_department_practitioner_id'))?></div>
			</div>
			<div class="large-8 column">
				<div class="data-value"><?php echo $element->o_operating_department_practitioner ? $element->o_operating_department_practitioner->fullName : $element->operating_department_practitioner?></div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-4 column">
				<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('assistant_id'))?></div>
			</div>
			<div class="large-8 column">
				<div class="data-value"><?php echo $element->o_assistant ? $element->o_assistant->fullName : $element->assistant?></div>
			</div>
		</div>
		<div class="row data-row">
			<div class="large-4 column">
				<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('anaesthetist_id'))?></div>
			</div>
			<div class="large-8 column">
				<div class="data-value"><?php echo $element->o_anaesthetist ? $element->o_anaesthetist->fullName : $element->anaesthetist?></div>
			</div>
		</div>
	</div>
</section>
