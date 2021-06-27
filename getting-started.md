---
description: Quick Usage
---

# Getting Started

### Install:

Use composer to install

```php
composer require mitmelon/guard-power
```

### Usage :

```php
require_once __DIR__."/vendor/autoload.php";

// Place GuardPower Class untop of your application
$guardPower = new GuardPower();
$guardPower->init();
//Your Application Code Here
```

### Properties Setup:

You can change GuardTor properties by calling it before calling the init\(\) method.

```php
//Allow GuardTor to create or modify .htaccess with added functionalities to prevent bad bots
//Default is false.
//Please make sure you only enable this on development for one request to prevent over-writeups
//Once request is complete from your browser, change $guardPower->createhtaccess = false;
//On production change to $guardPower->createhtaccess = false;
$guardPower->createhtaccess = true;
//Never block tor users
//Default is true.
$guardPower->blocktor = false;
//Set the block page url users will be redirected to once blocked
//Default is __DIR__.'/error.html';
$guardPower->blockLink = 'BLOCK_PAGE_URL';
//Prevent request block once limit is reached
//Default is true;
//Please note that setting this to true requires redis installed.
$guardPower->block_request = false;
//Set request limit per minute to reach before blocking request
//This could be used to prevent DDOS Attacks
//Default is 100 times per minutes
$guardPower->attempt = 100;
```

### Other Methods:

Methods to use for strings sanitizations, retrieve IP address and get device info.

```php
/**
 * Validate IPV4 and IPV6 address
 * @param $ip string
 * @return boolean || string
 */
$guardPower->validate_ip($ip);
/**
 * Get device ID from every request including device fingerprint
 * @return array
 */
$guardPower->getDeviceInfo();
/**
 * Get request IP Address
 * @return string
 */
$guardPower->get_ip();
/**
 * Advance cleaning of strings from user inputs
 * @param $value string to clean
 * @return string
 */
$guardPower->strip($value);
/**
 * Clean html inputs to prevent xss attacks
 * @param $html string to clean
 * @return string
 */
$guardPower->filterHtml($html);
```

### Future Updates :

* Spam Detections/Blocker

## License

Released under the MIT license.

