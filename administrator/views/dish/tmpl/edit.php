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

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('formbehavior.chosen', 'select');
JHtml::_('behavior.keepalive');

// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_dzfoodmenu/assets/css/dzfoodmenu.css');
?>
<script type="text/javascript">
    js = jQuery.noConflict();
    js(document).ready(function(){
        
    });
    
    Joomla.submitbutton = function(task)
    {
        if(task == 'dish.cancel'){
            Joomla.submitform(task, document.getElementById('dish-form'));
        }
        else{
            
            if (task != 'dish.cancel' && document.formvalidator.isValid(document.id('dish-form'))) {
                
                Joomla.submitform(task, document.getElementById('dish-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_dzfoodmenu&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="dish-form" class="form-validate">
    <div class="row-fluid">
        <div class="span10 form-horizontal">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>

            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_DZFOODMENU_DETAILS', true)); ?>
            <div class="row-fluid">
                <div class="span6">
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('title'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('title'); ?></div>
                    </div>
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('alias'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('alias'); ?></div>
                    </div>                    
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('catid'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('catid'); ?></div>
                    </div>
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('thumbnail', 'images'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('thumbnail', 'images'); ?></div>
                    </div>
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('full', 'images'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('full', 'images'); ?></div>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span6">
                    <?php echo $this->form->getLabel('description'); ?><br />
                    <?php echo $this->form->getInput('description'); ?>
                </div>
                <div class="span6">
                    <?php echo $this->form->getLabel('note'); ?><br />
                    <?php echo $this->form->getInput('note'); ?>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>
            
            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'prices', JText::_('COM_DZFOODMENU_PRICES', true)); ?>
            <div class="row-fluid">
                <div class="span6">
                    <h5><?php echo JText::_('COM_DZFOODMENU_FORM_FIELDSET_DISH_PRICES'); ?></h5>
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('medium', 'prices'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('medium', 'prices'); ?></div>
                    </div>
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('large', 'prices'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('large', 'prices'); ?></div>
                    </div>
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('special', 'prices'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('special', 'prices'); ?></div>
                    </div>
                </div>
                <div class="span6">
                    <h5><?php echo JText::_('COM_DZFOODMENU_FORM_FIELDSET_DISH_SALEOFF'); ?></h5>
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('medium', 'saleoff'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('medium', 'saleoff'); ?></div>
                    </div>
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('large', 'saleoff'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('large', 'saleoff'); ?></div>
                    </div>
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('special', 'saleoff'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('special', 'saleoff'); ?></div>
                    </div>
                </div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>
            
            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'alternative', JText::_('COM_DZFOODMENU_ALTERNATIVE', true)); ?>
            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('title', 'alternative'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('title', 'alternative'); ?></div>
            </div>
            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('description', 'alternative'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('description', 'alternative'); ?></div>
            </div>
            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('note', 'alternative'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('note', 'alternative'); ?></div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>
             
            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'publishing', JText::_('COM_DZFOODMENU_PUBLISHING', true)); ?>
            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('id'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('id'); ?></div>
            </div>
            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('created'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('created'); ?></div>
            </div>
            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('created_by'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('created_by'); ?></div>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>

            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'metadata', JText::_('JGLOBAL_FIELDSET_METADATA_OPTIONS', true)); ?>
                <?php echo JLayoutHelper::render('joomla.edit.metadata', $this); ?>
            <?php echo JHtml::_('bootstrap.endTab'); ?>

            <?php if (JFactory::getUser()->authorise('core.admin','com_dzfoodmenu')): ?>
            <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'permissions', JText::_('COM_DZFOODMENU_RULES', true)); ?>
            <div class="fltlft" style="width:86%;">
                <fieldset class="panelform">
                <?php echo JHtml::_('sliders.start', 'permissions-sliders-'.$this->item->id, array('useCookie'=>1)); ?>
                <?php echo JHtml::_('sliders.panel', JText::_('ACL Configuration'), 'access-rules'); ?>
                <?php echo $this->form->getInput('rules'); ?>
                <?php echo JHtml::_('sliders.end'); ?>
                </fieldset>
            </div>
            <?php echo JHtml::_('bootstrap.endTab'); ?>
            <?php endif; ?>

        <?php echo JHtml::_('bootstrap.endTabSet'); ?>
        </div>

        <div class="clr"></div>
        <!-- Begin Sidebar -->
        <?php echo JLayoutHelper::render('joomla.edit.details', $this); ?>
        <!-- End Sidebar -->
        
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?>

    </div>
</form>