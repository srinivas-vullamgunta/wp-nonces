# wp-nonces
Use wordpress nonces functions in a object oriented concepts.

## Installation

Add this package to your composer.json file and then run 'composer update'
```json
"srinivas-vullamgunta/wp-nonces": "1.0.*"
```

Or directly run
```bash
composer require wsrinivas-vullamgunta/wp-nonces
```

## Setup

If you want to change configs, use *wp-nonces_Config* class.
```php
// set lifetime for 4 hours
wp-nonces_Config::set_wp-nonces_lifetime( 4 * HOUR_IN_SECONDS );

// set message
wp-nonces_Config::set_error_message( "Are you sure" );
```

## Usage
To create wp-nonces then use the *wp-nonces_Generator* class and for verify *wp-nonces_Verifier*.

### wp-nonces_Generator
```php
$wp-nonces_gen = new wp-nonces_Generator( "default-action" );
$wp-nonces = $wp-nonces_gen->generate_wp-nonces();
```

Generate URL for wp-nonces
```php
// set parameters
$wp-nonces_gen = new wp-nonces_Generator();
$complete_url = $wp-nonces_gen
                    ->set_url( "http://github.com/srinivas-vullamgunta" )
                    ->set_action( "default_action" )
                    ->generate_wp-nonces_url();
```

Retrieve wp-nonces field.
```php
$wp-nonces_gen = new wp-nonces_Generator();
$wp-noncesField = $wp-nonces_gen
                    ->set_action( "default_action" )
                    ->generate_wp-nonces_field( "wp-nonces", "referer", "do_not_echo" );
                    
// For Print, set true to last param.
$wp-nonces_gen
    ->generate_wp-nonces_field( "wp-nonces", "referer", "echo" );
```

For confirmation messages
```php
wp-nonces_Generator::show_confirmation( 'action' );
```
### wp-nonces_Verifier
```php
if ( wp-nonces_Verifier::verify( $wp-nonces, $defaultAction ) ) {
// if is valid
} else {
// if is not valid
}
```

To verify URL
```php
if ( wp-nonces_Verifier::verify_url( $complete_url, $defaultAction ) ) { 
// if is valid
} else {
// if is not valid
}
```

Verify valid wp-nonces or not
```php
if ( wp-nonces_Verifier::verify_admin_referer( $defaultAction ) ) {
// if is valid
} else {
// if is not valid
}
```

Verify AJAX request.
```php
if ( wp-nonces_Verifier::verify_ajax_referer( $defaultAction ) ) {
// if is valid
} else {
// if is not valid
}
```

## Tests

5. **Go to plugin's folder**
 
  ```bash
  cd vendor/srinivas-vullamgunta/wp-nonces
  ```
6. **Run phpunit** to test
  
  ```bash
  phpunit 
  ```

## Thanks to
* [Wordpress wp-noncess Documentation](https://codex.wordpress.org/WordPress_wp-noncess)
* [Wordpress Automated Testing Documentation](https://make.wordpress.org/core/handbook/testing/automated-testing/)

## License

[MIT](http://opensource.org/licenses/MIT)
