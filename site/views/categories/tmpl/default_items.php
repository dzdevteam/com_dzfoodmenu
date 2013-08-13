<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
require_once JPATH_COMPONENT.'/helpers/route.php';
$class = ' class="first"';
JHtml::_('bootstrap.tooltip');
$lang   = JFactory::getLanguage();

if (count($this->items[$this->parent->id]) > 0 && $this->maxLevelcat != 0) :
?>
    <?php foreach($this->items[$this->parent->id] as $id => $item) : ?>
        <?php   
        if (!isset($this->items[$this->parent->id][$id + 1]))
        {
            $class = ' class="last"';
        }
        ?>
        <ul <?php echo $class; ?> >
        <?php $class = ''; ?>
            <h3><?php echo $this->escape($item->title); ?> / <?php echo $this->escape($item->params['title']); ?></h3>
            <?php if (isset($item->dishes) && count($item->dishes)) : ?>
            <ul>
                <?php foreach ($item->dishes as $dish) : ?>
                <li>
                    <a href="<?php echo $dish->link; ?>" title="<?php echo $dish->title; ?>" class="title" ><?php echo $dish->title; ?></a>
                    <br />
                    <a href="<?php echo $dish->link; ?>" title="<?php echo $dish->alternative['title']; ?>" class="title-alt"><?php echo $dish->alternative['title']; ?></a>
                    <br />
                    Price: <span class="price-medium"><?php echo $dish->prices['medium']; ?></span>
                    <br />
                    <span class="description"><?php echo $dish->description; ?></span>
                    <br />
                    <span class="description-alt"><?php echo $dish->alternative['description']; ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
            <?php endif; ?>
            <?php if (count($item->getChildren()) > 0) :?>
                <ul id="category-<?php echo $item->id;?>">
                <?php
                $this->items[$item->id] = $item->getChildren();
                $this->parent = $item;
                $this->maxLevelcat--;
                echo $this->loadTemplate('items');
                $this->parent = $item->getParent();
                $this->maxLevelcat++;
                ?>
                </ul>
            <?php endif; ?>
        </ul>
    <?php endforeach; ?>
<?php endif; ?>
