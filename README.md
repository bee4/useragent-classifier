bee4/useragent-classifier
======================

[![Build Status](https://img.shields.io/travis/bee4/useragent-classifier.svg?style=flat-square)](https://travis-ci.org/bee4/useragent-classifier)
[![Scrutinizer Code Quality](https://img.shields.io/scrutinizer/g/bee4/useragent-classifier.svg?style=flat-square)](https://scrutinizer-ci.com/g/bee4/useragent-classifier/?branch=develop)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/bee4/useragent-classifier.svg?style=flat-square)](https://scrutinizer-ci.com/g/bee4/useragent-classifier/)
[![SensiolabInsight](https://img.shields.io/sensiolabs/i/3f165beb-2425-4669-a3da-c1794c6f7337.svg?style=flat-square)](https://insight.sensiolabs.com/projects/3f165beb-2425-4669-a3da-c1794c6f7337)

[![License](https://img.shields.io/packagist/l/bee4/useragent-classifier.svg?style=flat-square)](https://packagist.org/packages/bee4/useragent-classifier)

This library allow to track and detect who is behind useragents :)


Installing
----------
[![Latest Stable Version](https://img.shields.io/packagist/v/bee4/useragent-classifier.svg?style=flat-square)](https://packagist.org/packages/bee4/useragent-classifier)
[![Total Downloads](https://img.shields.io/packagist/dm/bee4/useragent-classifier.svg?style=flat-square)](https://packagist.org/packages/bee4/useragent-classifier)

This project can be installed using Composer. Add the following to your composer.json:

```JSON
{
    "require": {
        "bee4/useragent-classifier": "~1.0"
    }
}
```

or run this command:

```Shell
composer require bee4/useragent-classifier:~1.0
```

Usage
-----

This library is composed of a `Detector` object and different `Bots` implementation.

```php
use Bee4\UserAgent\Classifier\Detector;

$ua = 'Mozilla/5.0 (compatible; Mail.RU/2.0)';
$bot = Detector::whoIs($ua); //$bot is a Bots\MailRU instance

$bot->getBot(); //Here we get `mailru`
$bot->getName(); //Here we get `mailru-bot`

$ua = 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)';
$bot = Detector::whoIs($ua); //$bot is a Bots\Google instance

$bot->getBot(); //Here we get `google`
$bot->getName(); //Here we get `google-bot`
