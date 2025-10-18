<?php
/**
 * @license GPL-2.0-or-later
 *
 * @file
 */

namespace MediaWiki\Extension\BoilerPlate;

use MediaWiki\Hook\BeforePageDisplayHook;
use MediaWiki\Html\Html;

class Hooks implements BeforePageDisplayHook {

	/** @inheritDoc */
	public function onBeforePageDisplay( $out, $skin ): void {
		$config = $out->getConfig();
		if ( $config->get( 'BoilerPlateVandalizeEachPage' ) ) {
			$out->addModules( 'oojs-ui-core' );
			$out->addHTML( Html::element( 'p', [], 'BoilerPlate was here' ) );
		}
	}

}
