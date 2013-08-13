<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');

JHtml::_('behavior.framework');

// Create some shortcuts.
$params     = &$this->item->params;
$n          = count($this->items);
$listOrder  = $this->escape($this->state->get('list.ordering'));
$listDirn   = $this->escape($this->state->get('list.direction'));
?>

<?php if (empty($this->items)) : ?>

    <?php if ($this->params->get('show_no_articles', 1)) : ?>
    <p><?php echo JText::_('COM_DZFOODMENU_NO_ITEMS'); ?></p>
    <?php endif; ?>

<?php else : ?>
    <table class="category table table-striped table-bordered table-hover">
        <tbody>
            <?php foreach ($this->items as $i => $dish) : ?>
                <?php if ($this->items[$i]->state == 0) : ?>
                 <tr class="system-unpublished cat-list-row<?php echo $i % 2; ?>">
                <?php else: ?>
                <tr class="cat-list-row<?php echo $i % 2; ?>" >
                <?php endif; ?>
                    <td headers="categorylist_header_title" class="list-title">
                        <a href="<?php echo $dish->link; ?>" title="<?php echo $dish->title; ?>"><?php echo $dish->title; ?></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php // Add pagination links ?>
<?php if (!empty($this->items)) : ?>
    <?php if (($this->params->def('show_pagination', 2) == 1  || ($this->params->get('show_pagination') == 2)) && ($this->pagination->pagesTotal > 1)) : ?>
    <div class="pagination">

        <?php if ($this->params->def('show_pagination_results', 1)) : ?>
            <p class="counter pull-right">
                <?php echo $this->pagination->getPagesCounter(); ?>
            </p>
        <?php endif; ?>

        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
    <?php endif; ?>
<?php  endif; ?>
