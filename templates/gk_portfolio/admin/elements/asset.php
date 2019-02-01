<?php

defined('JPATH_BASE') or die;
if(!defined('DS')){ define('DS',DIRECTORY_SEPARATOR); }
jimport('joomla.form.formfield');

if(!function_exists('isJoomla4')){
  function isJoomla4() {
    return version_compare(JVERSION, '4.0', 'ge');
  }
}

class JFormFieldAsset extends JFormField {
  protected $type = 'Asset';

  protected function getInput() {
    $doc = JFactory::getDocument();
    $refresher = rand(1000000, 9999999);
     
    if($this->element['extension'] == 'js') {
      if (isJoomla4()) {
        $doc->addScript(JURI::root().str_replace('.js','4.js',$this->element['path'] . '?r=' . $refresher));
      } else {
        $doc->addScript(JURI::root().$this->element['path'] . '?r=' . $refresher);     
      }
     
    } else {
      if (isJoomla4()) {
        $doc->addStyleSheet(JURI::root().str_replace('.css','4.css',$this->element['path'] . '?r=' . $refresher));
      } else {
        $doc->addStyleSheet(JURI::root().$this->element['path'] . '?r=' . $refresher);       
      }
    }
    return;
  }
}

/* EOF */
