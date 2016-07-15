# PHP JSON Pretty Printer

[![Build Status](https://travis-ci.org/markenwerk/php-json-pretty-printer.svg?branch=master)](https://travis-ci.org/markenwerk/php-json-pretty-printer)
[![Test Coverage](https://codeclimate.com/github/markenwerk/php-json-pretty-printer/badges/coverage.svg)](https://codeclimate.com/github/markenwerk/php-json-pretty-printer/coverage)
[![Dependency Status](https://www.versioneye.com/user/projects/577d62ac91aab50027c6ca4d/badge.svg)](https://www.versioneye.com/user/projects/577d62ac91aab50027c6ca4d)
[![SensioLabs Insight](https://img.shields.io/sensiolabs/i/7850184e-1ddf-483f-8cd5-a408926b089e.svg)](https://insight.sensiolabs.com/projects/7850184e-1ddf-483f-8cd5-a408926b089e)
[![Code Climate](https://codeclimate.com/github/markenwerk/php-json-pretty-printer/badges/gpa.svg)](https://codeclimate.com/github/markenwerk/php-json-pretty-printer)
[![Latest Stable Version](https://poser.pugx.org/markenwerk/json-pretty-printer/v/stable)](https://packagist.org/packages/markenwerk/json-pretty-printer)
[![Total Downloads](https://poser.pugx.org/markenwerk/json-pretty-printer/downloads)](https://packagist.org/packages/markenwerk/json-pretty-printer)
[![License](https://poser.pugx.org/markenwerk/json-pretty-printer/license)](https://packagist.org/packages/markenwerk/json-pretty-printer)

A PHP library providing pretty printing JSON strings for PHP < 5.4 based upon [this StackOverflow answer by Kendall Hopkins](http://stackoverflow.com/a/9776726).

## Installation

```{json}
{
   	"require": {
        "markenwerk/json-pretty-printer": "~1.0"
    }
}
```

## Usage

### Autoloading and namesapce

```{php}  
require_once('path/to/vendor/autoload.php');
```

### Pretty printing a JSON string

Default indentation is one tab.

```{php}
use Markenwerk\JsonPrettyPrinter;

$jsonString = json_encode($myObject);
$prettyPrinter = new JsonPrettyPrinter\JsonPrettyPrinter();
$prettyPrinted = $prettyPrinter
	->setIndentationString('  ')
	->prettyPrint($jsonString);
```

---

## Contribution

Contributing to our projects is always very appreciated.  
**But: please follow the contribution guidelines written down in the [CONTRIBUTING.md](https://github.com/markenwerk/php-json-pretty-printer/blob/master/CONTRIBUTING.md) document.**

## License

PHP JSON Pretty Printer is under the MIT license.
