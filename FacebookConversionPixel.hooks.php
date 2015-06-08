<?php
/**
 * Hooks for FacebookConversionPixel extension
 *
 * @file
 * @ingroup Extensions
 */

class FacebookConversionPixelHooks {
	public static function onSkinAfterBottomScripts( $skin, &$text ) {
		// Run this only if it's a low (/regular) priority
		if( !self::isHighPriority() ) {
			$text .= self::getFbPixelScript( $skin );
		};
	}

	public static function onBeforePageDisplay( OutputPage &$out, Skin &$skin ) {
		// Run this only if it's a high priority
		if( self::isHighPriority() ) {
			$out->addHeadItem( 'FacebookConversionPixel', self::getFbPixelScript( $skin ) );
		}
	}

	private static function isHighPriority() {
		global $egFacebookConversionPixelHighPriority;
		return ( $egFacebookConversionPixelHighPriority === true );
	}


	private static function getFbPixelScript( Skin $skin ) {
		global $egFacebookConversionPixelId;

		if( empty( $egFacebookConversionPixelId ) ) {
			throw new MWException( "You must set \$egFacebookConversionPixelId to the Pixel ID supplied by Facebook" );
		}

		if ( $skin->getUser()->isAllowed( 'noanalytics' ) ) {
			return "\n<!-- Facebook Conversion Pixel tracking is disabled for this user -->\n";
		}

		$script = <<< SCRIPT
‪<script>(function() {
  var _fbq = window._fbq || (window._fbq = []);
  if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
  }
  _fbq.push(['addPixelId', '{$egFacebookConversionPixelId}']);
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', 'PixelInitialized', {}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id={$egFacebookConversionPixelId}&amp;ev=PixelInitialized" /></noscript>‬
SCRIPT;

		return $script;

	}

}
