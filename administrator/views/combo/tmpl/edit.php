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
        
	js('input:hidden.dishes').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('disheshidden')){
			js('#jform_dishes option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_dishes").trigger("liszt:updated");
    });
    
    Joomla.submitbutton = function(task)
    {
        if(task == 'combo.cancel'){
            Joomla.submitform(task, document.getElementById('combo-form'));
        }
        else{
            
            if (task != 'combo.cancel' && document.formvalidator.isValid(document.id('combo-form'))) {
                
	if(js('#jform_dishes option:selected').length == 0){
		js("#jform_dishes option[value=0]").attr('selected','selected');
	}
                Joomla.submitform(task, document.getElementById('combo-form'));
            }
            else {
                alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
            }
        }
    }
</script>

<form action="<?php echo JRoute::_('index.php?option=com_dzfoodmenu&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="combo-form" class="form-validate">
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
                        <div class="control-label"><?php echo $this->form->getLabel('dishes'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('dishes'); ?></div>
                    </div>
                    <?php
                        foreach((array)$this->item->dishes as $value): 
                            if(!is_array($value)):
                                echo '<input type="hidden" class="dishes" name="jform[disheshidden]['.$value.']" value="'.$value.'" />';
                            endif;
                        endforeach;
                    ?>          
                </div>
                <div class="span6">
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('image'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('image'); ?></div>
                    </div>
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('total_price'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('total_price'); ?></div>
                    </div>
                    <div class="control-group">
                        <div class="control-label"><?php echo $this->form->getLabel('combo_price'); ?></div>
                        <div class="controls"><?php echo $this->form->getInput('combo_price'); ?></div>
                    </div>
                </div>                
            </div>
            <div class="control-group">
                <div class="control-label"><?php echo $this->form->getLabel('description'); ?></div>
                <div class="controls"><?php echo $this->form->getInput('description'); ?></div>
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