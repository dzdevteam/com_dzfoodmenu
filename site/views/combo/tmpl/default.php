<?php
/**
 * @version     1.0.0
 * @package     com_dzfoodmenu
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      DZ Team <dev@dezign.vn> - dezign.vn
 */
// no direct access
defined('_JEXEC') or die;

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_dzfoodmenu', JPATH_ADMINISTRATOR);

?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">

            			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_ID'); ?>:
			<?php echo $this->item->id; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_ORDERING'); ?>:
			<?php echo $this->item->ordering; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_STATE'); ?>:
			<?php echo $this->item->state; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_CHECKED_OUT'); ?>:
			<?php echo $this->item->checked_out; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_CHECKED_OUT_TIME'); ?>:
			<?php echo $this->item->checked_out_time; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_TITLE'); ?>:
			<?php echo $this->item->title; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_ALIAS'); ?>:
			<?php echo $this->item->alias; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_DESCRIPTION'); ?>:
			<?php echo $this->item->description; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_IMAGE'); ?>:
			<?php echo $this->item->image; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_TOTAL_PRICE'); ?>:
			<?php echo $this->item->total_price; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_COMBO_PRICE'); ?>:
			<?php echo $this->item->combo_price; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_DISHES'); ?>:
			<?php echo $this->item->dishes; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_METAKEY'); ?>:
			<?php echo $this->item->metakey; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_METADESC'); ?>:
			<?php echo $this->item->metadesc; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_METADATA'); ?>:
			<?php echo $this->item->metadata; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_COMBO_PARAMS'); ?>:
			<?php echo $this->item->params; ?></li>


        </ul>

    </div>
    
<?php
else:
    echo JText::_('COM_DZFOODMENU_ITEM_NOT_LOADED');
endif;
?>
