<?php
/**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2013
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2013, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
?>

<section class="element element-data">
	<h3 class="data-title"><?php echo $element->elementType->name ?></h3>

	<div class="element-data">
		<div class="row">
			<div class="large-12 column data-value highlight">
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('change_of_medical_history_since_pre_operative_assessment'))?>::</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->change_of_medical_history_since_pre_operative_assessment ? 'Yes' : 'No'?></div>
					</div>
				</div>
		<?php if ($element->change_of_medical_history_since_pre_operative_assessment && $element->history_change_notes) {?>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('history_change_notes'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->history_change_notes?></div>
					</div>
				</div>
		<?php }?>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('inr_level_if_applicable'))?></div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->inr_level_if_applicable?></div>
					</div>
				</div>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('pre_operative_checklist_completed_and_filed_in_notes'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->pre_operative_checklist_completed_and_filed_in_notes ? 'Yes' : 'No'?></div>
					</div>
				</div>
				<div class="row data-row">
					<div class="large-4 column">
						<div class="data-label"><?php echo CHtml::encode($element->getAttributeLabel('cdj_checklist_completed_and_filed_in_notes'))?>:</div>
					</div>
					<div class="large-8 column">
						<div class="data-value"><?php echo $element->cdj_checklist_completed_and_filed_in_notes ? 'Yes' : 'No'?></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
