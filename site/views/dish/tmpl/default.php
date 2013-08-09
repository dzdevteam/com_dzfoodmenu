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
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_FIELDSET_DISH_PRICES'); ?>:
			<ul>
                <li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_PRICES_MEDIUM'); ?>:
                <?php echo $this->item->prices['medium']; ?></li>
                <li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_PRICES_LARGE'); ?>:
                <?php echo $this->item->prices['large']; ?></li>
                <li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_PRICES_SPECIAL'); ?>:
                <?php echo $this->item->prices['special']; ?></li>
            </ul>
            </li>
            <li><?php echo JText::_('COM_DZFOODMENU_FORM_FIELDSET_DISH_SALEOFF'); ?>:
            <ul>
                <li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_PRICES_MEDIUM'); ?>:
                <?php echo $this->item->saleoff['medium']; ?></li>
                <li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_PRICES_LARGE'); ?>:
                <?php echo $this->item->saleoff['large']; ?></li>
                <li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_PRICES_SPECIAL'); ?>:
                <?php echo $this->item->saleoff['special']; ?></li>
            </ul>
            </li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_IMAGES'); ?>:
            <ul>
                <li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_IMAGES_THUMBNAIL'); ?>:
                <?php echo $this->item->images['thumbnail']; ?></li>
                <li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_IMAGES_FULL'); ?>:
                <?php echo $this->item->images['full']; ?></li>
			</ul>
			</li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_FEATURED'); ?>:
			<?php echo $this->item->featured; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_ALT_TITLE'); ?>:
			<?php echo $this->item->alternative['title']; ?></li>
			<li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_ALT_DESCRIPTION'); ?>:
            <?php echo $this->item->alternative['description']; ?></li>
            <li><?php echo JText::_('COM_DZFOODMENU_FORM_LBL_DISH_ALT_NOTE'); ?>:
            <?php echo $this->item->alternative['note']; ?></li>
			<li>Tags: <?php echo $this->item->tags; ?></li>


        </ul>

    </div>
    
<?php
else:
    echo JText::_('COM_DZFOODMENU_ITEM_NOT_LOADED');
endif;
?>
