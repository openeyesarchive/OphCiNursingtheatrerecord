
<div class="element-data highlight">
	<div class="row data-row">
		<div class="large-4 column">
			<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('spo2'))?>:</div>
		</div>
		<div class="large-8 column">
			<div class="data-value"><?php echo $element->spo2?>%</div>
		</div>
	</div>
	<div class="row data-row">
		<div class="large-4 column">
			<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('oxygen'))?>:</div>
		</div>
		<div class="large-8 column">
			<div class="data-value"><?php echo $element->oxygen?>%</div>
		</div>
	</div>
	<div class="row data-row">
		<div class="large-4 column">
			<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('temperature'))?>:</div>
		</div>
		<div class="large-8 column">
			<div class="data-value"><?php echo $element->temperature?>°C</div>
		</div>
	</div>
	<div class="row data-row">
		<div class="large-4 column">
			<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('pulse'))?>:</div>
		</div>
		<div class="large-8 column">
			<div class="data-value"><?php echo $element->pulse?> bpm</div>
		</div>
	</div>
</div>
