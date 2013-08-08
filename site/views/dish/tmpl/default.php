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

            			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_ID'); ?>:
			<?php echo $this->item->id; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_ORDERING'); ?>:
			<?php echo $this->item->ordering; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_STATE'); ?>:
			<?php echo $this->item->state; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_CHECKED_OUT'); ?>:
			<?php echo $this->item->checked_out; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_CHECKED_OUT_TIME'); ?>:
			<?php echo $this->item->checked_out_time; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_CREATED'); ?>:
			<?php echo $this->item->created; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_CREATED_BY'); ?>:
			<?php echo $this->item->created_by; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_TITLE'); ?>:
			<?php echo $this->item->title; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_ALIAS'); ?>:
			<?php echo $this->item->alias; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_CATID'); ?>:
			<?php echo $this->item->catid_title; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_DESCRIPTION'); ?>:
			<?php echo $this->item->description; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_NOTE'); ?>:
			<?php echo $this->item->note; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_PRICES'); ?>:
			<?php echo $this->item->prices; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_SALEOFF'); ?>:
			<?php echo $this->item->saleoff; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_IMAGES'); ?>:
			<?php echo $this->item->images; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_FEATURED'); ?>:
			<?php echo $this->item->featured; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_ALTERNATIVE'); ?>:
			<?php echo $this->item->alternative; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_PARAMS'); ?>:
			<?php echo $this->item->params; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_METAKEY'); ?>:
			<?php echo $this->item->metakey; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_METADESC'); ?>:
			<?php echo $this->item->metadesc; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_METADATA'); ?>:
			<?php echo $this->item->metadata; ?></li>


        </ul>

    </div>
    
<?php
else:
    echo JText::_('COM_DZFOODMENU_ITEM_NOT_LOADED');
endif;
?>
