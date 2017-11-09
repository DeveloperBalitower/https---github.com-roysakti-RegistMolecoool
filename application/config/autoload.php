<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('database', 'session', 'form_validation', 'pagination', 'cart', 'upload' );
$autoload['helper'] = array('url', 'file', 'form', 'security', 'html', 'fungsi', 'dataaccess', 'api');
$autoload['model'] = array('dataaccess_mdl', 'datatables_mdl');
$autoload['config'] = array();
$autoload['language'] = array();