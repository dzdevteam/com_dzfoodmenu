<?php
/**
 * @version     1.0.0
 * @package     com_dzfoodmenu
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      DZ Team <dev@dezign.vn> - dezign.vn
 */

defined('_JEXEC') or die;

/**
 * DZ Food Menu HTML helper
 *
 * @package     com_dzfoodmenu
 */
abstract class JHtmlDZFoodMenuAdministrator
{
    /**
     * Show the feature/unfeature links
     *
     * @param   int      $value      The state value
     * @param   int      $i          Row number
     * @param   boolean  $canChange  Is user allowed to change?
     *
     * @return  string       HTML code
     */
    public static function featured($value = 0, $i, $canChange = true)
    {
        JHtml::_('bootstrap.tooltip');

        // Array of image, task, title, action
        $states = array(
            0   => array('unfeatured',  'dishes.featured',    'COM_DZFOODMENU_UNFEATURED',   'COM_DZFOODMENU_TOGGLE_TO_FEATURE'),
            1   => array('featured',    'dishes.unfeatured',  'COM_DZFOODMENU_FEATURED',     'COM_DZFOODMENU_TOGGLE_TO_UNFEATURE'),
        );
        $state  = JArrayHelper::getValue($states, (int) $value, $states[1]);
        $icon   = $state[0];

        if ($canChange)
        {
            $html   = '<a href="#" onclick="return listItemTask(\'cb' . $i . '\',\'' . $state[1] . '\')" class="btn btn-micro hasTooltip' . ($value == 1 ? ' active' : '') . '" title="' . JHtml::tooltipText($state[3]) . '"><i class="icon-'
                    . $icon . '"></i></a>';
        }
        else
        {
            $html   = '<a class="btn btn-micro hasTooltip disabled' . ($value == 1 ? ' active' : '') . '" title="' . JHtml::tooltipText($state[2]) . '"><i class="icon-'
                    . $icon . '"></i></a>';
        }

        return $html;
    }
}
