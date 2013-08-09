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
require_once JPATH_COMPONENT.'/helpers/route.php';

/**
 * Methods supporting a list of Dzfoodmenu records.
 */
class DzfoodmenuModelCombos extends JModelList {

    /**
     * Constructor.
     *
     * @param    array    An optional associative array of configuration settings.
     * @see        JController
     * @since    1.6
     */
    public function __construct($config = array()) {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = array(
                                'id', 'a.id',
                'ordering', 'a.ordering',
                'state', 'a.state',
                'created_by', 'a.created_by',
                'title', 'a.title',
                'alias', 'a.alias',
                'description', 'a.description',
                'image', 'a.image',
                'total_price', 'a.total_price',
                'combo_price', 'a.combo_price',
                'dishes', 'a.dishes',
                'metakey', 'a.metakey',
                'metadesc', 'a.metadesc',
                'metadata', 'a.metadata',
                'params', 'a.params',

            );
        }
        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since	1.6
     */
    protected function populateState($ordering = 'ordering', $direction = 'ASC') {

        // Initialise variables.
        $app = JFactory::getApplication();

        // List state information
        $limit = $app->getUserStateFromRequest('global.list.limit', 'limit', $app->getCfg('list_limit'));
        $this->setState('list.limit', $limit);

        $limitstart = JFactory::getApplication()->input->getInt('limitstart', 0);
        $this->setState('list.start', $limitstart);

        $orderCol = $app->input->get('filter_order', 'a.ordering');
        if (!in_array($orderCol, $this->filter_fields))
        {
            $orderCol = 'a.ordering';
        }
        $this->setState('list.ordering', $orderCol);

        $listOrder = $app->input->get('filter_order_Dir', 'ASC');
        if (!in_array(strtoupper($listOrder), array('ASC', 'DESC', '')))
        {
            $listOrder = 'ASC';
        }
        $this->setState('list.direction', $listOrder);

        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return	JDatabaseQuery
     * @since	1.6
     */
    protected function getListQuery() {
        // Create a new query object.
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        // Select the required fields from the table.
        $query->select(
                $this->getState(
                        'list.select', 'a.*'
                )
        );

        $query->from('`#__dzfoodmenu_combos` AS a');

        
    // Join over the users for the checked out user.
    $query->select('uc.name AS editor');
    $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
    
		// Join over the created by field 'created_by'
		$query->select('created_by.name AS created_by');
		$query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
		// Join over the foreign key 'dishes'
		$query->select('#__dzfoodmenu_dishes_412915.title AS dishes_title_412915');
		$query->join('LEFT', '#__dzfoodmenu_dishes AS #__dzfoodmenu_dishes_412915 ON #__dzfoodmenu_dishes_412915.id = a.dishes');
        

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int) substr($search, 3));
            } else {
                $search = $db->Quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.title LIKE '.$search.'  OR  a.alias LIKE '.$search.' )');
            }
        }

        

		//Filtering dishes
		$filter_dishes = $this->state->get("filter.dishes");
		if ($filter_dishes) {
			$query->where("a.dishes = '".$filter_dishes."'");
		}
        
        // Only show published item
        $query->where("a.state = 1");
        
        // Add the list ordering clause.
        $query->order($this->getState('list.ordering', 'a.ordering') . ' ' . $this->getState('list.direction', 'ASC'));
        
        return $query;
    }

    public function getItems() {
        $items = parent::getItems();
        
        foreach ($items as &$item) {
            $item->link = JRoute::_(DZFoodMenuHelperRoute::getComboRoute($item->id));
        }
        
        return $items;
    }

}
