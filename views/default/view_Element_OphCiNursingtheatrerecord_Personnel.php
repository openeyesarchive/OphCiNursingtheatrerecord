
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('scrub_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->o_scrub_nurse ? $element->o_scrub_nurse->fullName : $element->scrub_nurse?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('floor_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->o_floor_nurse ? $element->o_floor_nurse->fullName : $element->floor_nurse?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('accompanying_nurse_id'))?></td>
			<td><span class="big"><?php echo $element->o_accompanying_nurse ? $element->o_accompanying_nurse->fullName : $element->accompanying_nurse?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('surgeon_id'))?></td>
			<td><span class="big"><?php echo $element->o_surgeon ? $element->o_surgeon->fullName : $element->surgeon?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('operating_department_practitioner_id'))?></td>
			<td><span class="big"><?php echo $element->o_operating_department_practitioner ? $element->o_operating_department_practitioner->fullName : $element->operating_department_practitioner?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('assistant_id'))?></td>
			<td><span class="big"><?php echo $element->o_assistant ? $element->o_assistant->fullName : $element->assistant?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('anaesthetist_id'))?></td>
			<td><span class="big"><?php echo $element->o_anaesthetist ? $element->o_anaesthetist->fullName : $element->anaesthetist?></span></td>
		</tr>
	</tbody>
</table>
