<?php /**
 * OpenEyes
 *
 * (C) Moorfields Eye Hospital NHS Foundation Trust, 2008-2011
 * (C) OpenEyes Foundation, 2011-2012
 * This file is part of OpenEyes.
 * OpenEyes is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.
 * OpenEyes is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with OpenEyes in a file titled COPYING. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package OpenEyes
 * @link http://www.openeyes.org.uk
 * @author OpenEyes <info@openeyes.org.uk>
 * @copyright Copyright (c) 2008-2011, Moorfields Eye Hospital NHS Foundation Trust
 * @copyright Copyright (c) 2011-2012, OpenEyes Foundation
 * @license http://www.gnu.org/licenses/gpl-3.0.html The GNU General Public License V3.0
 */
 ?>
<div class="element <?php echo $element->elementType->class_name?>"
	data-element-type-id="<?php echo $element->elementType->id ?>"
	data-element-type-class="<?php echo $element->elementType->class_name ?>"
	data-element-type-name="<?php echo $element->elementType->name ?>"
	data-element-display-order="<?php echo $element->elementType->display_order ?>">
	<h4 class="elementTypeName"><?php  echo $element->elementType->name; ?></h4>

	<div id="div_Element_OphCiNursingtheatrerecord_Personnel_scrub_nurse_id" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('scrub_nurse_id')?>:</div>
		<div class="data">
			<?php echo $form->dropDownList($element, 'scrub_nurse_id', CHtml::listData(User::model()->active()->findAll(array('order'=> 'first_name asc')),'id','fullName'),array('empty'=>'- Please select -', 'nowrapper' => true))?>
			&nbsp;&nbsp;&nbsp;
			<?php echo $form->textField($element, 'scrub_nurse', array('size'=>30, 'nowrapper'=>true))?>
		</div>
	</div>
	<div id="div_Element_OphCiNursingtheatrerecord_Personnel_floor_nurse_id" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('floor_nurse_id')?>:</div>
		<div class="data">
			<?php echo $form->dropDownList($element, 'floor_nurse_id', CHtml::listData(User::model()->active()->findAll(array('order'=> 'first_name asc')),'id','fullName'),array('empty'=>'- Please select -', 'nowrapper' => true))?>
			&nbsp;&nbsp;&nbsp;
			<?php echo $form->textField($element, 'floor_nurse', array('size'=>30, 'nowrapper'=>true))?>
		</div>
	</div>
	<div id="div_Element_OphCiNursingtheatrerecord_Personnel_accompanying_nurse_id" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('accompanying_nurse_id')?>:</div>
		<div class="data">
			<?php echo $form->dropDownList($element, 'accompanying_nurse_id', CHtml::listData(User::model()->active()->findAll(array('order'=> 'first_name asc')),'id','fullName'),array('empty'=>'- Please select -', 'nowrapper' => true))?>
			&nbsp;&nbsp;&nbsp;
			<?php echo $form->textField($element, 'accompanying_nurse', array('size'=>30, 'nowrapper'=>true))?>
		</div>
	</div>
	<div id="div_Element_OphCiNursingtheatrerecord_Personnel_surgeon_id" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('surgeon_id')?>:</div>
		<div class="data">
			<?php echo $form->dropDownList($element, 'surgeon_id', CHtml::listData(User::model()->active()->findAll(array('order'=> 'first_name asc')),'id','fullName'),array('empty'=>'- Please select -', 'nowrapper' => true))?>
			&nbsp;&nbsp;&nbsp;
			<?php echo $form->textField($element, 'surgeon', array('size'=>30, 'nowrapper'=>true))?>
		</div>
	</div>
	<div id="div_Element_OphCiNursingtheatrerecord_Personnel_operating_department_practitioner_id" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('operating_department_practitioner_id')?>:</div>
		<div class="data">
			<?php echo $form->dropDownList($element, 'operating_department_practitioner_id', CHtml::listData(User::model()->active()->findAll(array('order'=> 'first_name asc')),'id','fullName'),array('empty'=>'- Please select -', 'nowrapper' => true))?>
			&nbsp;&nbsp;&nbsp;
			<?php echo $form->textField($element, 'operating_department_practitioner', array('size'=>30, 'nowrapper'=>true))?>
		</div>
	</div>
	<div id="div_Element_OphCiNursingtheatrerecord_Personnel_anaesthetist_id" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('anaesthetist_id')?>:</div>
		<div class="data">
			<?php echo $form->dropDownList($element, 'anaesthetist_id', CHtml::listData(User::model()->active()->findAll(array('order'=> 'first_name asc')),'id','fullName'),array('empty'=>'- Please select -', 'nowrapper' => true))?>
			&nbsp;&nbsp;&nbsp;
			<?php echo $form->textField($element, 'anaesthetist', array('size'=>30, 'nowrapper'=>true))?>
		</div>
	</div>
	<div id="div_Element_OphCiNursingtheatrerecord_Personnel_assistant_id" class="eventDetail">
		<div class="label"><?php echo $element->getAttributeLabel('assistant_id')?>:</div>
		<div class="data">
			<?php echo $form->dropDownList($element, 'assistant_id', CHtml::listData(User::model()->active()->findAll(array('order'=> 'first_name asc')),'id','fullName'),array('empty'=>'- Please select -', 'nowrapper' => true))?>
			&nbsp;&nbsp;&nbsp;
			<?php echo $form->textField($element, 'assistant', array('size'=>30, 'nowrapper'=>true))?>
		</div>
	</div>
</div>
