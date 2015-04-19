<?php
/*
Plugin Name: Analytics Spam Blocker
Description: This plugin blocks spam sites like semalt.com and buttons-for-website.com from reaching your website and affecting your Google Analytics statistics.
Version: 1.0
Author: Luke Williamson
Author URI: http://lukewilliamson.com.au
License: GPLv2
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! class_exists( 'AnalyticsSpamBlocker' ) ) :

	class AnalyticsSpamBlocker {

		static function enable () {
			include_once ( ABSPATH . '/wp-admin/includes/misc.php' );
			$htaccess_file =  ABSPATH . '.htaccess';

			$rules = "RewriteEngine on\n";
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*semalt\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.semalt.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*buttons-for-website\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.buttons-for-website.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*buttons-for-your-website\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.buttons-for-your-website.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*best-seo-solution\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.best-seo-solution.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*best-seo-offer\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.best-seo-offer.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*forum.topic31342700.darodar\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.forum.topic31342700.darodar.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*darodar\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.darodar.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*anticrawler\.org [NC]\n";
			$rules .= "RewriteRule (.*) http://www.anticrawler.org [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://www1.([^.]+\.)*social-buttons\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www1.social-buttons.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://www.([^.]+\.)*make-money-online.7makemoneyonline\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.make-money-online.7makemoneyonline.com [R=301,L]";
			
			$rules = explode ( "\n", $rules );
			insert_with_markers( $htaccess_file, 'Analytics Spam Blocker', $rules );
		}

		static function disable () {
			include_once ( ABSPATH . '/wp-admin/includes/misc.php' );
			$htaccess_file =  ABSPATH . '.htaccess';

			insert_with_markers ( $htaccess_file, 'Analytics Spam Blocker', '' );
		}
	}

	register_activation_hook ( __FILE__, array( 'Analytics Spam Blocker', 'enable' ) );
	register_deactivation_hook ( __FILE__, array( 'Analytics Spam Blocker', 'disable' ) );

endif;