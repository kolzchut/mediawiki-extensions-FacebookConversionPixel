<?php
/**
 * FacebookConversionPixel extension
 **
 * @file
 * @ingroup Extensions
 * @author Dror S., 2015
 * @license GNU General Public Licence 2.0 or later
 */

$globals['wgExtensionCredits']['other'][] = array(
	'path' => __FILE__,
	'name' => 'FacebookConversionPixel',
	'author' => array(
		'Dror S. for [http://www.kolzchut.org.il Kol-Zchut]',
	),
	'version'  => '0.1.0',
	//'url' => 'https://www.mediawiki.org/wiki/Extension:FacebookConversionPixel',
	'descriptionmsg' => 'facebookconversionpixel-desc',
);

/* Setup */

// Register files
$globals['wgAutoloadClasses']['FacebookConversionPixelHooks'] = __DIR__ . '/FacebookConversionPixel.hooks.php';
$globals['$wgMessagesDirs']['FacebookConversionPixel'] = __DIR__ . '/i18n';


// Hooks
$globals['wgHooks']['SkinAfterBottomScripts'][] = 'FacebookConversionPixelHooks::onSkinAfterBottomScripts';
$globals['wgHooks']['BeforePageDisplay'][]  = 'FacebookConversionPixelHooks:onBeforePageDisplay';


/* Configuration */
$globals['egFacebookConversionPixelId'] = null;
$globals['egFacebookConversionPixelHighPriority'] = false; // Place script in top or bottom
