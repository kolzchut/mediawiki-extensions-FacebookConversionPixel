<?php
/**
 * FacebookConversionPixel extension
 **
 * @file
 * @ingroup Extensions
 * @author Dror S. [FFS]
 * @copyright © 2015 Dror S. & Kol-Zchut Ltd.
 * @license GNU General Public Licence 2.0 or later
 */

$GLOBALS['wgExtensionCredits']['other'][] = array(
	'name' => 'FacebookConversionPixel',
	'author' => array(
		'Dror S. [FFS] ([http://www.kolzchut.org.il Kol-Zchut])',
	),
	'version'  => '0.1.0',
	'license-name' => 'GPL-2.0+',
	'url' => 'https://github.com/kolzchut/mediawiki-extensions-FacebookConversionPixel',
	'descriptionmsg' => 'facebookconversionpixel-desc',
	'path' => __FILE__
);

/* Setup */

// Register files
$GLOBALS['wgAutoloadClasses']['FacebookConversionPixelHooks'] = __DIR__ . '/FacebookConversionPixel.hooks.php';
$GLOBALS['wgMessagesDirs']['FacebookConversionPixel'] = __DIR__ . '/i18n';


// Hooks
$GLOBALS['wgHooks']['SkinAfterBottomScripts'][] = 'FacebookConversionPixelHooks::onSkinAfterBottomScripts';
$GLOBALS['wgHooks']['BeforePageDisplay'][]  = 'FacebookConversionPixelHooks::onBeforePageDisplay';


/* Configuration */
$GLOBALS['egFacebookConversionPixelId'] = null;
$GLOBALS['egFacebookConversionPixelHighPriority'] = false; // Place script in top or bottom
