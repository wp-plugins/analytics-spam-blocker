<?php
/*
Plugin Name: Analytics Spam Blocker
Description: This plugin blocks spam sites like semalt.com and buttons-for-website.com from reaching your website and affecting your Google Analytics statistics.
Version: 1.7
Author: Luke Williamson
Author URI: http://lukewilliamson.com.au
License: GPLv2
*/

defined('ABSPATH') or die("No script kiddies please!");

register_activation_hook( __FILE__, 'AnalyticsSpamBlockerActivate' );
register_deactivation_hook( __FILE__, 'AnalyticsSpamBlockerDeactivate' );


function AnalyticsSpamBlockerActivate()
{
	$home_path = get_home_path();
	$parsed_url = parse_url(site_url());
	if ( ( ! file_exists( $home_path.'.htaccess' ) && is_writable( $home_path ) ) || is_writable( $home_path . '.htaccess' ) ) {
		// We can make our changes
		if(file_exists( $home_path.'.htaccess' )){
			// Edit File
			$lines = file($home_path.'.htaccess');			
			//$lines[] = "\n";
			$lines[] = "\n# Analytics Spam Blocker - Start\n";
			$lines[] = "SetEnvIfNoCase Referer semalt.com spambot=yes\n";
			$lines[] = "SetEnvIfNoCase Referer darodar.com spambot=yes\n";
			$lines[] = "SetEnvIfNoCase Referer buttons-for-website.com spambot=yes\n";
			$lines[] = "Order allow,deny\n";
			$lines[] = "Allow from all\n";
			$lines[] = "Deny from env=spambot\n";
			$lines[] = "# Analytics Spam Blocker - End";
			
			$fp = fopen($home_path.'.htaccess', 'w');
			foreach($lines as $line){
				fwrite($fp, "$line");
			}
			fclose($fp);
		} else {
			// New File
			$fp = fopen($home_path.'.htaccess','w');
			fwrite($fp, "# Analytics Spam Blocker - Start\n");
			fwrite($fp,"SetEnvIfNoCase Referer semalt.com spambot=yes\n");
			fwrite($fp,"SetEnvIfNoCase Referer darodar.com spambot=yes\n");
			fwrite($fp,"SetEnvIfNoCase Referer buttons-for-website.com spambot=yes\n");
			fwrite($fp,"Order allow,deny\n");
			fwrite($fp,"Allow from all\n");
			fwrite($fp,"Deny from env=spambot\n");
			fwrite($fp, "# Analytics Spam Blocker - End");
			fclose($fp);
		}
	} else {
		// Not writable
		wp_die(_e('Your .htaccess file or root WordPress directory is not writable'));
	}
	
	//Delete old 1.5 plugin area
	if ( is_writable( $home_path.'.htaccess' ) ) {
		$fileOld = file_get_contents($home_path.'.htaccess');
		$fileOld = deleteOldText('# BEGIN Analytics Spam Blocker', '# END Analytics Spam Blocker', $fileOld);
		
		$fpOld = fopen($home_path.'.htaccess', 'w');
		fwrite($fpOld, $fileOld);
		fclose($fpOld);
	} else {
		// Not writable
		wp_die(_e('Your .htaccess file is not writable or doesn\'t exist.'));
	}
}
function deleteOldText($startOld, $endOld, $stringOld)
{
  $beginningPosOld = strpos($stringOld, $startOld);
  $endPosOld = strpos($stringOld, $endOld);
  if ($beginningPosOld === false || $endPosOld === false) {
    return $stringOld;
  }

  $deleteOld = substr($stringOld, $beginningPosOld, ($endPosOld + strlen($endOld)) - $beginningPosOld);

  return str_replace($deleteOld, '', $stringOld);
}

function AnalyticsSpamBlockerDeactivate()
{
	$home_path = get_home_path();
	$parsed_url = parse_url(site_url());
	if ( is_writable( $home_path.'.htaccess' ) ) {
		// We can make our changes
		$file = file_get_contents($home_path.'.htaccess');
		$file = DeleteCurrentCode('# Analytics Spam Blocker - Start', '# Analytics Spam Blocker - End', $file);
		
		$fp = fopen($home_path.'.htaccess', 'w');
		fwrite($fp, $file);
		fclose($fp);
	} else {
		// Not writable
		wp_die(_e('Your .htaccess file is not writable or doesn\'t exist.'));
	}
}

function DeleteCurrentCode($start, $end, $string)
{
  $beginningPos = strpos($string, $start);
  $endPos = strpos($string, $end);
  if ($beginningPos === false || $endPos === false) {
    return $string;
  }

  $delete = substr($string, $beginningPos, ($endPos + strlen($end)) - $beginningPos);

  return str_replace($delete, '', $string);
}