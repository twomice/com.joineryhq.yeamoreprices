<?php

require_once 'yeamoreprices.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function yeamoreprices_civicrm_config(&$config) {
  
  // Typically this would just call _yeamoreprices_civix_civicrm_config($config),
  // which uses some fairly tame assumptions to extend the PHP include path and 
  // smarty template directories list.
  // However, because this extension relies (for the moment) on PHP and Smarty
  // template overrides (see README.md for more discussion of that), and it
  // also aims to be compatible with multiple CiviCRM versions, we need a little
  // more complex logic to determine the PHP and template override directories.
  // So this function just replaces _yeamoreprices_civix_civicrm_config($config)
  // with some version-dependent logic.
   
  static $configured = FALSE;
  if ($configured) {
    return;
  }
  $configured = TRUE;

  // Get the current major version (e.g., 4.6, 4.7).
  $major_version = implode('.', array_slice(explode('.', CRM_Utils_System::version()), 0, 2));
  
  $extRoot = dirname(__FILE__) . DIRECTORY_SEPARATOR;

  // Add the appropriate version-specific directory to the list of smarty 
  // template directories.
  $template =& CRM_Core_Smarty::singleton();
  $extTplDir = $extRoot . 'templates' . DIRECTORY_SEPARATOR . $major_version;
  if (is_array($template->template_dir)) {
    array_unshift($template->template_dir, $extTplDir);
  }
  else {
    $template->template_dir = array($extTplDir, $template->template_dir);
  }

  // Add the appropriate version-specific directory to the PHP path.
  $include_path = $extRoot . 'custom_code' . DIRECTORY_SEPARATOR . $major_version . PATH_SEPARATOR . get_include_path();
  set_include_path($include_path);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function yeamoreprices_civicrm_xmlMenu(&$files) {
  _yeamoreprices_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function yeamoreprices_civicrm_install() {
  _yeamoreprices_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function yeamoreprices_civicrm_postInstall() {
  _yeamoreprices_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function yeamoreprices_civicrm_uninstall() {
  _yeamoreprices_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function yeamoreprices_civicrm_enable() {
  _yeamoreprices_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function yeamoreprices_civicrm_disable() {
  _yeamoreprices_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function yeamoreprices_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _yeamoreprices_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function yeamoreprices_civicrm_managed(&$entities) {
  _yeamoreprices_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function yeamoreprices_civicrm_caseTypes(&$caseTypes) {
  _yeamoreprices_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function yeamoreprices_civicrm_angularModules(&$angularModules) {
  _yeamoreprices_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function yeamoreprices_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _yeamoreprices_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function yeamoreprices_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function yeamoreprices_civicrm_navigationMenu(&$menu) {
  _yeamoreprices_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'com.joineryhq.yeamoreprices')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _yeamoreprices_civix_navigationMenu($menu);
} // */
