<?php

namespace tests;

use Nonces\WpNonce;

/**
 * @author  srinivas vullamgunta
 */
class WpNonceTest extends \PHPUnit_Framework_TestCase
{
   /**
	 *
	 * @var ExternalCriteria
	 */
	private static $nonce;

	public function testSetAction() {
		$expected = -1;
		self::$nonce = new WpNonce();
		$this->assertSame($expected, self::$nonce->setAction());
	}

	public function testWpVerifyNonce() {  
		self::$nonce = new WpNonce();
		$nonceVerifyVal = '';
		$this->assertFalse(self::$nonce->nonceAys($nonceVerifyVal));
	} 
}	