<?php
/**
 * @version     1.0.0
 * @package     com_dzfoodmenu
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      DZ Team <dev@dezign.vn> - dezign.vn
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Combos list controller class.
 */
class DzfoodmenuControllerCombos extends DzfoodmenuController
{
    /**
     * Proxy for getModel.
     * @since   1.6
     */
    public function &getModel($name = 'Combos', $prefix = 'DzfoodmenuModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
}