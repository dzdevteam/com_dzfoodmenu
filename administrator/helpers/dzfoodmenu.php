<?php
/**
 * @version     1.0.0
 * @package     com_dzfoodmenu
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      DZ Team <dev@dezign.vn> - dezign.vn
 */

// No direct access
defined('_JEXEC') or die;

/**
 * Dzfoodmenu helper.
 */
class DzfoodmenuHelper
{
    /**
     * Configure the Linkbar.
     */
    public static function addSubmenu($vName = '')
    {
        JHtmlSidebar::addEntry(
            JText::_('COM_DZFOODMENU_TITLE_DISHES'),
            'index.php?option=com_dzfoodmenu&view=dishes',
            $vName == 'dishes'
        );
        JHtmlSidebar::addEntry(
            'Categories (Dishes - Category)',
            "index.php?option=com_categories&extension=com_dzfoodmenu.dishes.catid",
            $vName == 'categories.dishes'
        );
        
if ($vName=='categories.dishes.catid') {            
JToolBarHelper::title('DZ Food Menu: Categories (Dishes - Category)');      
}       JHtmlSidebar::addEntry(
            JText::_('COM_DZFOODMENU_TITLE_COMBOS'),
            'index.php?option=com_dzfoodmenu&view=combos',
            $vName == 'combos'
        );

    }

    /**
     * Gets a list of the actions that can be performed.
     *
     * @return  JObject
     * @since   1.6
     */
    public static function getActions()
    {
        $user   = JFactory::getUser();
        $result = new JObject;

        $assetName = 'com_dzfoodmenu';

        $actions = array(
            'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.edit.own', 'core.edit.state', 'core.delete'
        );

        foreach ($actions as $action) {
            $result->set($action, $user->authorise($action, $assetName));
        }

        return $result;
    }
}
