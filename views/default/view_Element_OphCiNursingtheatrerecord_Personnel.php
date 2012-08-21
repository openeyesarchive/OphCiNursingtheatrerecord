
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('scrub_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->scrub_nurse ? $element->scrub_nurse->first_name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('floor_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->floor_nurse ? $element->floor_nurse->first_name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('accompanying_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->accompanying_nurse ? $element->accompanying_nurse->first_name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('surgeon_id'))?></td>
			<td><span class="big"><?php echo $element->surgeon ? $element->surgeon->first_name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('operating_department_practitioner_id'))?></td>
			<td><span class="big"><?php echo $element->operating_department_practitioner ? $element->operating_department_practitioner->first_name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('assistant_id'))?></td>
			<td><span class="big"><?php echo $element->assistant ? $element->assistant->first_name : 'None'?></span></td>
		</tr>
	</tbody>
</table>
