Laravel 5 wrapper around ircmaxell/RandomLib
============================================

[![Build Status](https://travis-ci.org/webcraft/laravel-random.svg?branch=master)](https://travis-ci.org/webcraft/laravel-random)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webcraft/laravel-random/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/webcraft/laravel-random/?branch=master)

This package provides a Laravel 5.1+ Facade for [RandomLib by ircmaxell](https://github.com/ircmaxell/RandomLib).
It lets you generate random numbers and strings, both for general usage and for usages in security contexts, such as tokens or strong cryptograhic keys.

Installation
------------

The package can be installed via composer

``` bash
$ composer require webcraft/laravel-random
```

Then, add the service provider to your config/app.php file:

```php
// config/app.php

'providers' => [
    ...
    Webcraft\Random\RandomServiceProvider::class,
    ...
];
```

If you want to use the facade, add this:

```php
// config/app.php

'aliases' => [
	  ...
        'Random' => Webcraft\Random\RandomFacade::class
    ...
]
```

This package comes with a config file, where you can define the generator strength. The default strength level is **medium**.
If you want to specify a different strength level, copy the package config file to your local config folder with the publish command:

```bash
php artisan vendor:publish --provider="Webcraft\Random\RandomServiceProvider"
```

These are the 3 possible strength levels for your generator:

#### low

Low Strength should be used anywhere that random strings are needed in a
non-cryptographical setting.  They are not strong enough to be used as
keys or salts.  They are however useful for one-time use tokens.


#### medium (default)

Medium Strength should be used for most needs of a cryptographic nature.
They are strong enough to be used as keys and salts.  However, they do
take some time and resources to generate, so they should not be over-used


#### high

High Strength keys should ONLY be used for generating extremely strong
cryptographic keys.  Generating them is very resource intensive and may
take several minutes or more depending on the requested size.

**There are currently no mixers shipped with this package that are
capable of creating a high space generator. This will not work out of
the box!**


Usage
-----

```php
// Generate a random string that is 32 bytes in length.
$string = Random::generate(32);

// Generate a whole number between 5 and 15.
$int = Random::generateInt(5, 15);

// Generate a 32 character string that only contains the letters
// 'a', 'b', 'c', 'd', 'e', and 'f'.
$string = Random::generateString(32, 'abcdef');
```

#### Random::generate($size)

Generate a random byte string of the requested size.


#### Random::generateInt($min = 0, $max = PHP_INT_MAX)

Generate a random integer with the given range. If range (`$max - $min`)
is zero, `$max` will be used.


#### Random::generateString($length, $characters = '')

Generate a random string of specified length.

This uses the supplied character list for generating the new result
string. The list of characters should be specified as a string containing
each allowed character.

If no character list is specified, the following list of characters is used:

    0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+/

**Examples:**

```php
// Give the character list 'abcdef':
print Random::generateString(32, 'abcdef')."\n";

// One would expect to receive output that only contained those
// characters:
//
// adaeabecfbddcdaeedaedfbbcdccccfe
// adfbfdbfddadbfcbbefebcacbefafffa
// ceeadbcabecbccacdcaabbdccfadbafe
// abadcffabdcacdbcbafcaecabafcdbbf
// dbdbddacdeaceabfaefcbfafebcacdca
```


Changelog
---------

Please see [CHANGELOG](CHANGELOG.md) for more information.

License
-------

This library is licensed under the MIT license. Please see [License file](LICENSE.md) for more information.
