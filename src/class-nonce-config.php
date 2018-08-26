<?php

/**
 * Configurations for Nonces
 * User: srinivas-vullamgunta
 * Date: 26/08/2018
 */
class Nonce_Config {
	/**
	 * @var int $nonceLifetimeInSeconds
	 */
	private static $nonceLifetimeInSeconds;

	/**
     * Set nonce lifetime in seconds
     *
	 * @var string $nonceErrorMessage
	 */
	private static $nonce_error_message;

	public static function set_nonce_lifetime( $seconds ) {
		self::$nonceLifetimeInSeconds = $seconds;

		add_filter( 'nonce_life', function () {
			return Nonce_Config::$nonceLifetimeInSeconds;
		});
	}

	/**
	 * Set message to be used when the method show_confirmation is called
	 *
	 * @param string $message
	 */
	public static function set_error_message( $message ) {
		self::$nonce_error_message = $message;

		add_filter( 'gettext', function ( $translation ) {
			return self::$nonce_error_message;
		});
	}
}