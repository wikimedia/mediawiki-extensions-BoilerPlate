<?php

namespace MediaWiki\Extension\BoilerPlate\Maintenance;

use Maintenance;

class BoilThePlate extends Maintenance {
	public function __construct() {
		parent::__construct();
		$this->requireExtension( 'BoilerPlate' );
	}

	public function execute() {
		$this->output( "BoilerPlate was here.\n" );
	}
}

// @codeCoverageIgnoreStart
$maintClass = BoilThePlate::class;
// @codeCoverageIgnoreEnd
