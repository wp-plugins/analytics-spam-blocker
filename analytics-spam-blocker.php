<?php
/*
Plugin Name: Analytics Spam Blocker
Description: This plugin blocks spam sites like semalt.com and buttons-for-website.com from reaching your website and affecting your Google Analytics statistics.
Version: 1.2
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
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*forum.topic61936458.darodar\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.forum.topic61936458.darodar.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*darodar\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.darodar.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*anticrawler\.org [NC]\n";
			$rules .= "RewriteRule (.*) http://www.anticrawler.org [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*googlsucks\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.googlsucks.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*make-money-online.7makemoneyonline\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.make-money-online.7makemoneyonline.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*7makemoneyonline\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.7makemoneyonline.com [R=301,L]\n";
            
            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*social-buttons\.com [NC]\n";
			$rules .= "RewriteRule (.*) http://www.social-buttons.com [R=301,L]\n";
            
            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*youporn-forum\.ga [NC]\n";
            $rules .= "RewriteRule (.*) http://www.youporn-forum.ga [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*domination\.ml [NC]\n";
            $rules .= "RewriteRule (.*) http://www.domination.ml [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*get-free-traffic-now\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.get-free-traffic-now.com [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*domination\.ml [NC]\n";
            $rules .= "RewriteRule (.*) http://www.domination.ml [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*pornhub-forum\.ga [NC]\n";
            $rules .= "RewriteRule (.*) http://www.pornhub-forum.ga [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*depositfiles-porn\.ga [NC]\n";
            $rules .= "RewriteRule (.*) http://www.depositfiles-porn.ga [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*rapidgator-porn\.ga [NC]\n";
            $rules .= "RewriteRule (.*) http://www.rapidgator-porn.ga [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*buy-cheap-online\.info [NC]\n";
            $rules .= "RewriteRule (.*) http://www.buy-cheap-online.info [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*generalporn\.org [NC]\n";
            $rules .= "RewriteRule (.*) http://www.generalporn.org [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*search.tb.ask\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.search.tb.ask.com [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*gotovim-doma\.ru [NC]\n";
            $rules .= "RewriteRule (.*) http://www.gotovim-doma.ru [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*depositfiles-porn\.ga [NC]\n";
            $rules .= "RewriteRule (.*) http://www.depositfiles-porn.ga [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*pornhubforum\.tk [NC]\n";
            $rules .= "RewriteRule (.*) http://www.pornhubforum.tk [R=301,L]\n";

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*editors.choice61797376.hulfingtonpost\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.editors.choice61797376.hulfingtonpost.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*editors.choice61936458.hulfingtonpost\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.editors.choice61936458.hulfingtonpost.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*editors.choice23400164.hulfingtonpost\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.editors.choice23400164.hulfingtonpost.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*hulfingtonpost\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.hulfingtonpost.com [R=301,L]\n";
			
			//Update 2.2 - 29/04/2015 [Start]
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*torture\.ml [NC]\n";
            $rules .= "RewriteRule (.*) http://www.torture.ml [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*pornhub-forum.uni\.me [NC]\n";
            $rules .= "RewriteRule (.*) http://www.pornhub-forum.uni.me [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*free-share-buttons\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.free-share-buttons.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*windowssearch\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.windowssearch.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*theguardlan\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.theguardlan.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*supb\.ro [NC]\n";
            $rules .= "RewriteRule (.*) http://www.supb.ro [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*econom\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.econom.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*ilovevitaly\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.ilovevitaly.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*ilovevitaly\.ru [NC]\n";
            $rules .= "RewriteRule (.*) http://www.ilovevitaly.ru [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*ilovevitaly\.biz [NC]\n";
            $rules .= "RewriteRule (.*) http://www.ilovevitaly.biz [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*ilovevitaly\.info [NC]\n";
            $rules .= "RewriteRule (.*) http://www.ilovevitaly.info [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*myftpupload\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.myftpupload.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*iskalko\.ru [NC]\n";
            $rules .= "RewriteRule (.*) http://www.iskalko.ru [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*lomb\.co [NC]\n";
            $rules .= "RewriteRule (.*) http://www.lomb.co [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*lombia\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.lombia.co [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*blackhatworth\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.blackhatworth.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*priceg\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.priceg.com [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*cenoval\.ru [NC]\n";
            $rules .= "RewriteRule (.*) http://www.cenoval.ru [R=301,L]\n";
			
			$rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*bestwebsitesawards\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.bestwebsitesawards.com [R=301,L]\n";
			
			//Update 2.2 - 29/04/2015 [End]

            $rules .= "RewriteCond %{HTTP_REFERER} ^http://([^.]+\.)*editors.choice61675363.hulfingtonpost\.com [NC]\n";
            $rules .= "RewriteRule (.*) http://www.editors.choice61675363.hulfingtonpost.com [R=301,L]";
			//Last line entry never contains \n before the closing "
			
			$rules = explode ( "\n", $rules );
			insert_with_markers( $htaccess_file, 'Analytics Spam Blocker', $rules );
		}

		static function disable () {
			include_once ( ABSPATH . '/wp-admin/includes/misc.php' );
			$htaccess_file =  ABSPATH . '.htaccess';

			insert_with_markers ( $htaccess_file, 'Analytics Spam Blocker', '' );
		}
	}

	register_activation_hook ( __FILE__, array( 'AnalyticsSpamBlocker', 'enable' ) );
	register_deactivation_hook ( __FILE__, array( 'AnalyticsSpamBlocker', 'disable' ) );

endif;