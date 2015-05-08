<?php
global $wpdb;

if( !defined('ABSPATH') && !defined('WP_UNINSTALL_PLUGIN') )
  exit();

insert_with_markers ( ABSPATH . '.htaccess', 'Analytics Spam Blocker', '' );