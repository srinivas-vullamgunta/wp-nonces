<?php

namespace Nonces;

use Nonces\WpNonceInterface;

class WpNonce implements WpNonceInterface
{
    
    /**
    * @var $action
    */
    private $action;

    /**
    * constructor.
    * @param $action
    */
    public function __construct($action = -1) {
        $this->action = $action;
    }

    /**
    * set action to generate nonces
    * @param string $action
    * @return $this
    */
    public function setAction() { 
        return  $this->action;
    }

   /**
    * Retrieves a nonce url
    * @param string     $actionurl URL to add nonce action.
    * @param string (optional) $keyName . Nonce param name. Default is _wpnonce
    * @return string
    */
    public function wpGenerateNonceUrl($actionurl, $key = '_wpnonce' ) { 
       return wp_nonce_url( $actionurl, $this->action, $key ); 
    }

    /**
    *Add nonce to URL actions
    *@param string     $actionurl URL to add nonce action.
    *@param int|string $action    Optional. Nonce action name. Default -1.
    *@return string Escaped URL with nonce action added
    */
    public static function wpNonceURL( $actionurl, $name = '_wpnonce' ) {
        return wp_nonce_url($actionurl, $this->action, $name);
    }

    /**
    *Create a nonce
    *@param $action :: this is a required string indicating the name of the nonce
    *@return this function return's a nonce token string
    */
    public static function wpCreateNonce() {
        return wp_create_nonce($this->action);
    }

    /**
    *Add nonce to a FORM
    *@param $action :: this is an optional string which represents the action name
    *@param $name   :: this is an optional string which represents the name of the nonce.
    *@param $referer:: this is an optional boolean used to determine whether the referer hidden form field should be created
    *@param $echo   :: this is an optional boolean to determine whether Wordpress should echo the nonce hidden field
    *@return string is a nonce hidden form field, optionally followed by the referer hidden form field if the $referer argument is set to true.
    */
    public static function wpNonceField($name='_wpnonce', $referer=true, $echo=true) {
        return wp_nonce_field($this->action, $name, $referer, $echo);
    }

    /**
    *Verifying nonces
    *@param $nonce :: this is a required field which indicates the Nonce to verify
    *@param $action:: this is an optional field which indicates the action specified when nonce was created
    *@return       :: this function will return boolean 'false' for an invalid nonce or
    *return '1' if nonce <= 12hours or
    *return '2' if 12hours < nonce < 24hours
    */
    public static function wpVerifyNonce($nonce) {
        return wp_verify_nonce($nonce, $this->action);
    }

    /**
    *An alternative way to verify nonces 
    *@param $action    :: this is a string name.
    *@param $query_arg :: this denotes the nonce name which WordPress will look for in the 
    *$_REQUEST variable. (defaults to _wpnonce if left blank)
    *@return           :: this function will return boolean 'false' for an invalid nonce or
    *return '1' if nonce <= 12hours or
    *return '2' if 12hours < nonce < 24hours
    */
    public static function adminReferer($query_arg = '_wpnonce') {
        return check_admin_referer($this->action, $query_arg );
    }

   /**
   *Verifying nonces in AJAX requests.
   *@param $action    :: this is a string name.
   *@param $query_arg :: this denotes the nonce name which WordPress will look for in the 
   *$_REQUEST variable. (defaults to _wpnonce if left blank)
   *@param  boolean $die Whether to die if the nonce is invalid.
   *@return :: this function will return boolean 'false' for an invalid nonce or
   *return '1' if nonce <= 12hours or
   *return '2' if 12hours < nonce < 24hours
   */
   public static function ajaxReferer($query_arg = false, $die = true ) {
        return check_ajax_referer($this->action, $queryArg, $die );
    }

    /**
    *Display's 'Are you sure you want to do this?' message to confirm the action being taken.
    *@param $action :: The required string nonce action.
    *@return  if $action is not set returns bool. 
    */
    public static function nonceAys( $action ) {
        if(empty($action)) {
            return false;
        }
        wp_nonce_ays( $action );
    }
}