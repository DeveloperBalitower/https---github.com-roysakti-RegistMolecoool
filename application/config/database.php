<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$active_group = 'default';
$active_record = TRUE;

$db['default']['hostname'] = '172.16.0.92';
$db['default']['username'] = 'yusa.febriyan';
$db['default']['password'] = '112233';
$db['default']['database'] = 'bts_balifiber';
$db['default']['dbdriver'] = 'mysqli';
$db['default']['dbprefix'] = '';
$db['default']['pconnect'] = TRUE;
$db['default']['db_debug'] = TRUE;
$db['default']['cache_on'] = FALSE;
$db['default']['cachedir'] = '';
$db['default']['char_set'] = 'utf8';
$db['default']['dbcollat'] = 'utf8_general_ci';
$db['default']['swap_pre'] = '';
$db['default']['autoinit'] = TRUE;
$db['default']['stricton'] = FALSE;

//$db['radius']['hostname'] = '192.168.169.12';172.16.1.136
$db['radius']['hostname'] = '172.16.1.136';
$db['radius']['username'] = 'root';
$db['radius']['password'] = 'radius_balitower_01';
$db['radius']['database'] = 'radius';
$db['radius']['dbdriver'] = 'mysqli';         
$db['radius']['dbprefix'] = '';
$db['radius']['pconnect'] = FALSE;
$db['radius']['db_debug'] = FALSE;
$db['radius']['cache_on'] = FALSE;
$db['radius']['cachedir'] = '';
$db['radius']['char_set'] = 'utf8';
$db['radius']['dbcollat'] = 'utf8_general_ci';
$db['radius']['swap_pre'] = '';
$db['radius']['autoinit'] = TRUE;
$db['radius']['stricton'] = FALSE;