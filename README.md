# WP Nonces

PHP OOP implementation of WordPress Nonces.

## Usage

- Create field nonce

```php
$field_nonce = new WpOriented\wpNonnes\wpFieldNonce( 'my_action' );
	$field_nonce->createNonceForForm();
```

- Create url nonce

```php
$url_nonce = new WpOriented\wpNonnes\wpUrlNonce( 'my_action' );
	echo $url_nonce->createNonceForUrl();
```

- Validate field nonce

```php
$field_nonce = new WpOriented\wpNonnes\wpFieldNonce('my_action');
	$validator = new WpOriented\wpNonnes\nonceValidator;
	$validator->isValid($nonce);
```

- Validate url nonce
```php
$nonce = new WpOriented\wpNonnes\wpUrlNonce('my_action');
	$validator = new WpOriented\wpNonnes\nonceValidator;
	$validator->isValid($nonce);
```

## Tests

```sh
$ vendor/bin/phpunit tests
```
