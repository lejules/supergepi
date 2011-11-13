<?php
// This file generated by Propel 1.5.4 convert-conf target
// from XML runtime conf file /var/www/susupergepi_2010/propel/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'supergepi' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'classname' => 'DebugPDO',
        'dsn' => 'mysql:dbname='.$GLOBALS["base"].';host='.$GLOBALS["host"],
        'user' => $GLOBALS["user"],
        'password' => $GLOBALS["mdp"],
        'options' => 
        array (
          'ATTR_PERSISTENT' => 
          array (
            'value' => false,
          ),
        ),
        'attributes' => 
        array (
          'ATTR_EMULATE_PREPARES' => 
          array (
            'value' => true,
          ),
        ),
        'settings' => 
        array (
          'charset' => 
          array (
            'value' => 'Latin1',
          ),
        ),
      ),
    ),
    'default' => 'supergepi',
  ),
  'log' => 
  array (
    'type' => 'display',
    'ident' => 'propel-supergepi',
    'name' => 'propel.log',
    'level' => '6',
  ),
  'generator_version' => '1.5.4',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-supergepi-conf.php');
return $conf;