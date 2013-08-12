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

jimport('joomla.application.component.controlleradmin');

/**
 * Dishes list controller class.
 */
class DzfoodmenuControllerDishes extends JControllerAdmin
{
    /**
     * Constructor
     */
     
    public function __construct($config = array())
    {
        parent::__construct($config);
        
        $this->registerTask('unfeatured',   'featured');
    }
    
    /**
     * Proxy for getModel.
     * @since   1.6
     */
    public function getModel($name = 'Dish', $prefix = 'DzfoodmenuModel')
    {
        $model = parent::getModel($name, $prefix, array('ignore_request' => true));
        return $model;
    }
    
    /**
     * Method to toggle the featured setting of a list of dishes.
     *
     * @return  void
     * @since   1.0
     */
    public function featured()
    {
        // Check for request forgeries
        JSession::checkToken() or jexit(JText::_('JINVALID_TOKEN'));

        $user   = JFactory::getUser();
        $ids    = $this->input->get('cid', array(), 'array');
        $values = array('featured' => 1, 'unfeatured' => 0);
        $task   = $this->getTask();
        $value  = JArrayHelper::getValue($values, $task, 0, 'int');

        // Access checks.
        foreach ($ids as $i => $id)
        {
            if (!$user->authorise('core.edit.state', 'com_dzfoodmenu.dish.'.(int) $id))
            {
                // Prune items that you can't change.
                unset($ids[$i]);
                JError::raiseNotice(403, JText::_('JLIB_APPLICATION_ERROR_EDITSTATE_NOT_PERMITTED'));
            }
        }

        if (empty($ids))
        {
            JError::raiseWarning(500, JText::_('JERROR_NO_ITEMS_SELECTED'));
        }
        else
        {
            // Get the model.
            $model = $this->getModel();

            // Publish the items.
            if (!$model->featured($ids, $value))
            {
                JError::raiseWarning(500, $model->getError());
            }
        }
        
        $this->setRedirect('index.php?option=com_dzfoodmenu&view=dishes');
    }
    
    /**
     * Method to save the submitted ordering values for records via AJAX.
     *
     * @return  void
     *
     * @since   3.0
     */
    public function saveOrderAjax()
    {
        // Get the input
        $input = JFactory::getApplication()->input;
        $pks = $input->post->get('cid', array(), 'array');
        $order = $input->post->get('order', array(), 'array');

        // Sanitize the input
        JArrayHelper::toInteger($pks);
        JArrayHelper::toInteger($order);

        // Get the model
        $model = $this->getModel();

        // Save the ordering
        $return = $model->saveorder($pks, $order);

        if ($return)
        {
            echo "1";
        }

        // Close the application
        JFactory::getApplication()->close();
    }
    
    
    
}