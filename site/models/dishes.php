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
class DzfoodmenuModelDishes extends JModelList {

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
                'created', 'a.created',
                'created_by', 'a.created_by',
                'title', 'a.title',
                'alias', 'a.alias',
                'catid', 'a.catid',
                'description', 'a.description',
                'note', 'a.note',
                'prices', 'a.prices',
                'saleoff', 'a.saleoff',
                'images', 'a.images',
                'featured', 'a.featured',
                'alternative', 'a.alternative',
                'params', 'a.params',
                'metakey', 'a.metakey',
                'metadesc', 'a.metadesc',
                'metadata', 'a.metadata',

            );
        }
        parent::__construct($config);
    }

    /**
     * Method to auto-populate the model state.
     *
     * Note. Calling getState in this method will result in recursion.
     *
     * @since   1.6
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
        
        $filter_comboid = $app->input->getInt('filter_comboid', 0);
        if ($filter_comboid) {
            $this->setState('filter.comboid', $filter_comboid);
        }
        
        $filter_featured = $app->input->getCmd('filter_featured', '');
        if (is_int($filter_featured)) {
            $this->setState('filter.featured', $filter_featured);
        }
        
        $filter_catid = $app->input->getInt('filter_catid', 0);
        if ($filter_catid) {
            $this->setState('filter.catid', $filter_catid);
        }

        // List state information.
        parent::populateState($ordering, $direction);
    }

    /**
     * Build an SQL query to load the list data.
     *
     * @return  JDatabaseQuery
     * @since   1.6
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

        $query->from('`#__dzfoodmenu_dishes` AS a');

        
    // Join over the users for the checked out user.
    $query->select('uc.name AS editor');
    $query->join('LEFT', '#__users AS uc ON uc.id=a.checked_out');
    
        // Join over the created by field 'created_by'
        $query->select('created_by.name AS created_by');
        $query->join('LEFT', '#__users AS created_by ON created_by.id = a.created_by');
        // Join over the category 'catid'
        $query->select('catid.title AS catid_title');
        $query->join('LEFT', '#__categories AS catid ON catid.id = a.catid');
        

        // Filter by search in title
        $search = $this->getState('filter.search');
        if (!empty($search)) {
            if (stripos($search, 'id:') === 0) {
                $query->where('a.id = ' . (int) substr($search, 3));
            } else {
                $search = $db->Quote('%' . $db->escape($search, true) . '%');
                $query->where('( a.title LIKE '.$search.' )');
            }
        }

        // Filtering comboid
        $filter_comboid = $this->state->get('filter.comboid');
        if ($filter_comboid) {
            $query->join('INNER', '#__dzfoodmenu_combos as c ON FIND_IN_SET(a.id, c.dishes) AND c.id = '.$filter_comboid);
        }

        //Filtering catid
        $filter_catid = $this->state->get("filter.catid");
        if ($filter_catid) {
            $query->where("a.catid = '".$filter_catid."'");
        }

        //Filtering featured
        $filter_featured = $this->state->get("filter.featured");
        if (is_int($filter_featured)) {
            $query->where("a.featured = ".$filter_featured);
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
            $item->link = JRoute::_(DZFoodMenuHelperRoute::getDishRoute($item->id));
        }
        
        return $items;
    }

}
