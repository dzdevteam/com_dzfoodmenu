<?php

/**
 * @version     1.0.0
 * @package     com_dzfoodmenu
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      DZ Team <dev@dezign.vn> - dezign.vn
 */
defined('_JEXEC') or die;

jimport('joomla.application.component.modellist');

/**
 * This models supports retrieving lists of dish categories.
 */
class DZFoodMenuModelCategories extends JModelList
{
    /**
     * Model context string.
     *
     * @var     string
     */
    public $_context = 'com_dzfoodmenu.dishes.catid';

    /**
     * The category context (allows other extensions to derived from this model).
     *
     * @var     string
     */
    protected $_extension = 'com_dzfoodmenu.dishes.catid';

    private $_parent = null;

    private $_items = null;

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since   1.6
     */
    protected function populateState($ordering = null, $direction = null)
    {
        $app = JFactory::getApplication();
        $this->setState('filter.extension', $this->_extension);

        // Get the parent id if defined.
        $parentId = $app->input->getInt('id');
        $this->setState('filter.parentId', $parentId);

        $params = $app->getParams();
        $this->setState('params', $params);

        $this->setState('filter.published', 1);
        $this->setState('filter.access',    true);
    }

    /**
     * Method to get a store id based on model configuration state.
     *
     * This is necessary because the model is used by the component and
     * different modules that might need different sets of data or different
     * ordering requirements.
     *
     * @param   string  $id A prefix for the store id.
     *
     * @return  string  A store id.
     */
    protected function getStoreId($id = '')
    {
        // Compile the store id.
        $id .= ':'.$this->getState('filter.extension');
        $id .= ':'.$this->getState('filter.published');
        $id .= ':'.$this->getState('filter.access');
        $id .= ':'.$this->getState('filter.parentId');

        return parent::getStoreId($id);
    }

    /**
     * Redefine the function an add some properties to make the styling more easy
     *
     * @param   bool    $recursive  True if you want to return children recursively.
     *
     * @return  mixed  An array of data items on success, false on failure.
     */
    public function getItems($recursive = false)
    {
        if (!count($this->_items))
        {
            $app = JFactory::getApplication();
            $menu = $app->getMenu();
            $active = $menu->getActive();
            $params = new JRegistry;

            if ($active)
            {
                $params->loadString($active->params);
            }

            $options = array();
            $options['countItems'] = $params->get('show_cat_num_articles_cat', 1) || !$params->get('show_empty_categories_cat', 0);
            $categories = JCategories::getInstance('DZFoodMenu.dishes', $options);
            $this->_parent = $categories->get($this->getState('filter.parentId', 'root'));
            
            if (is_object($this->_parent))
            {
                $this->_items = $this->_parent->getChildren($recursive);
            }
            else {
                $this->_items = false;
            }
        }

        return $this->_items;
    }

    public function getParent()
    {
        if (!is_object($this->_parent))
        {
            $this->getItems();
        }

        return $this->_parent;
    }
}
