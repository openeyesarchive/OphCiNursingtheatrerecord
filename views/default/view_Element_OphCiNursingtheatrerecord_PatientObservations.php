
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('spo2'))?></td>
			<td><span class="big"><?php echo $element->spo2?>%</span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('oxygen'))?></td>
			<td><span class="big"><?php echo $element->oxygen?>%</span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('temperature'))?></td>
			<td><span class="big"><?php echo $element->temperature?>°C</span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pulse'))?></td>
			<td><span class="big"><?php echo $element->pulse?> bpm</span></td>
		</tr>
	</tbody>
</table>
