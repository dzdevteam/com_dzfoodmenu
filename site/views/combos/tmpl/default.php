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
?>
<script type="text/javascript">
    function deleteItem(item_id){
        if(confirm("<?php echo JText::_('COM_DZFOODMENU_DELETE_MESSAGE'); ?>")){
            document.getElementById('form-combo-delete-' + item_id).submit();
        }
    }
</script>

<div class="items">
    <ul class="items_list">
        <?php $show = false; ?>
        <?php foreach ($this->items as $item) : ?>           
        <?php $show = true; ?>
            <li>
                <a href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
            </li>
        <?php endforeach; ?>
        <?php
        if (!$show):
            echo JText::_('COM_DZFOODMENU_NO_ITEMS');
        endif;
        ?>
    </ul>
</div>
<?php if ($show): ?>
    <div class="pagination">
        <p class="counter">
            <?php echo $this->pagination->getPagesCounter(); ?>
        </p>
        <?php echo $this->pagination->getPagesLinks(); ?>
    </div>
<?php endif; ?>

