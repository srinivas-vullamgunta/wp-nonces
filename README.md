# Wordpress Nonce OOP
A composer package which serves the functionality of WordPress Nonces with object oriented environment

Table of contents:
 * [Requirements](#requirements)
 * [Installation](#installation)
 * [Usage](#usage)

# Requirements

* PHP >= 5.4.0
* WordPress >= 4.6

# Installation

Add this package as requirement at your composer.json file and
then run 'composer update'

```json
"srinivas-vullamgunta/wp-nonces": "1.0.*"
```

Or directly run

```bash
composer require srinivas-vullamgunta/wp-nonces
```

# Usage

Setup:

```php
$vendor = dirname(__DIR__).'/vendor/';
if (! realpath($vendor)) {
    die('Please install via Composer before running tests.');
}
require_once $vendor.'autoload.php';
unset($vendor);
```

#Instantiate an object of the class

```php
$nonce = new WpNonce();
```
# Examples


To create Nonce 

```php
$nonce = new WpNonce();  
$nonce->wpCreateNonce('default_action');
```

To generate Nonce Url

```php
$nonce = new WpNonce(); 
$nonce ->setAction('default_action');
$nonce->wpGenerateNonceUrl('https://github.com/srinivas-vullamgunta/wp-nonces', '_wpnonce'));
```

To retrieve a nonce field.

```php
$nonce = new WpNonce(); 
$nonce ->setAction('default_action');
$nonce->wpNonceField('_wpnonce', referrer, true);
```

To Verify nonce

```php
$nonce = new WpNonce(); 
$nonce ->setAction('default_action');
$nonce->wpVerifyNonce($nonce);
```

# **Run phpunit** to test

 ```bash
  phpunit 
  ```

# Test Cases

```php
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
```

## Thanks to
* [Wordpress Nonces Documentation](https://codex.wordpress.org/WordPress_Nonces)

## License

[MIT](http://opensource.org/licenses/MIT)
