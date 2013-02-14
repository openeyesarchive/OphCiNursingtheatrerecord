
<h4 class="elementTypeName"><?php  echo $element->elementType->name ?></h4>

<table class="subtleWhite normalText">
	<tbody>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('surgery_id'))?></td>
			<td><span class="big"><?php echo $element->surgery ? $element->surgery->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('position_id'))?></td>
			<td><span class="big"><?php echo $element->position ? $element->position->name : 'None'?></span></td>
		</tr>
		<tr>
			<td width="30%"><?php echo CHtml::encode($element->getAttributeLabel('intraoperative_aids'))?></td>
			<td>
				<span class="big">
					<?php foreach ($element->intraoperative_aids as $aid) {?>
						<?php echo $aid->aid->name?><br/>
					<?php }?>
				</span>
			</td>
		</tr>
	</tbody>
</table>
