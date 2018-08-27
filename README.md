# WpNonceOOP
A compose package which serves the functionality of working with WordPress Nonces in object oriented environment


Table of contents:
 * [Requirements](#requirements)
 * [Installation](#installation)
 * [Usage](#usage)

1. Requirements

* PHP >= 5.4.0
* WordPress >= 4.6

2. Installation

You can install this class in both on command-line or by pasting it into wordpress plugin directory.

3. via Command-line

Using [Composer](https://getcomposer.org/), add Custom Nonce Class to your plugin's dependencies.

```sh
composer require srinivas-vullamgunta/wp-nonces
```
# Usage

Setup:

```php
<?php 

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Nonces\WpNonce;


// Instantiate an object of the class
$nonce = new WpNonce();
```
# Examples

Adding a nonce to a URL:

```php
$url="/../wp-admin/post.php?post=48";
$complete_url = $nonce->wp_nonce_url( $url, 'edit-post_'.$post->ID );
```

Adding a nonce to a form:

```php
$nonce->get_wp_nonce_field( 'delete-post_'.$post_id );
```

creating a nonce:

```php
$newnonce = $nonce->wp_create_nonce( 'action_'.$post->id );
```

Verifying a nonce:

```php
$nonce->wp_verify_nonce_field( 'delete-post_'.$post_id );
```

Verifying a nonce passed in an AJAX request:

```php
$nonce->wp_check_ajax_referer( 'post-comment' );
```

Verifying a nonce passed in some other context:

```php
$nonce->wp_check_admin_referer( $_REQUEST['my_nonce'], 'edit-post_'.$post->ID );
```

