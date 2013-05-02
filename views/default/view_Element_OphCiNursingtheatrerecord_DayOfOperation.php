
<?php /*
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('change_of_medical_history_since_pre_operative_assessment'))?>:</td>
			<td><span class="big"><?php echo $element->change_of_medical_history_since_pre_operative_assessment ? 'Yes' : 'No'?></span></td>
		</tr>
		<?php if ($element->change_of_medical_history_since_pre_operative_assessment && $element->history_change_notes) {?>
			<tr>
				<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('history_change_notes'))?>:</td>
				<td><span class="big"><?php echo $element->history_change_notes?></span></td>
			</tr>
		<?php }?>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('inr_level_if_applicable'))?></td>
			<td><span class="big"><?php echo $element->inr_level_if_applicable?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('pre_operative_checklist_completed_and_filed_in_notes'))?>:</td>
			<td><span class="big"><?php echo $element->pre_operative_checklist_completed_and_filed_in_notes ? 'Yes' : 'No'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('cdj_checklist_completed_and_filed_in_notes'))?>:</td>
			<td><span class="big"><?php echo $element->cdj_checklist_completed_and_filed_in_notes ? 'Yes' : 'No'?></span></td>
		</tr>
	</tbody>
</table>
*/?>
