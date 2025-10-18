<?php

namespace MediaWiki\Extension\BoilerPlate\Tests;

use MediaWiki\Config\HashConfig;
use MediaWiki\Extension\BoilerPlate\Hooks;
use MediaWiki\Output\OutputPage;
use MediaWiki\Skin\Skin;
use MediaWikiUnitTestCase;

/**
 * @covers \MediaWiki\Extension\BoilerPlate\Hooks
 */
class HooksTest extends MediaWikiUnitTestCase {
	public function testOnBeforePageDisplayVandalizeIsTrue() {
		$config = new HashConfig( [
			'BoilerPlateVandalizeEachPage' => true
		] );
		$outputPageMock = $this->getMockBuilder( OutputPage::class )
			->disableOriginalConstructor()
			->getMock();
		$outputPageMock->method( 'getConfig' )
			->willReturn( $config );

		$outputPageMock->expects( $this->once() )
			->method( 'addHTML' )
			->with( '<p>BoilerPlate was here</p>' );
		$outputPageMock->expects( $this->once() )
			->method( 'addModules' )
			->with( 'oojs-ui-core' );

		$skinMock = $this->getMockBuilder( Skin::class )
			->disableOriginalConstructor()
			->getMock();

		( new Hooks )->onBeforePageDisplay( $outputPageMock, $skinMock );
	}

	public function testOnBeforePageDisplayVandalizeFalse() {
		$config = new HashConfig( [
			'BoilerPlateVandalizeEachPage' => false
		] );
		$outputPageMock = $this->getMockBuilder( OutputPage::class )
			->disableOriginalConstructor()
			->getMock();
		$outputPageMock->method( 'getConfig' )
			->willReturn( $config );
		$outputPageMock->expects( $this->never() )
			->method( 'addHTML' );
		$outputPageMock->expects( $this->never() )
			->method( 'addModules' );
		$skinMock = $this->getMockBuilder( \Skin::class )
			->disableOriginalConstructor()
			->getMock();
		( new Hooks )->onBeforePageDisplay( $outputPageMock, $skinMock );
	}

}
