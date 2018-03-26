# WTF Generator

<!--[![Build Status](https://travis-ci.org/frameworkwtf/generator.svg?branch=master)](https://travis-ci.org/frameworkwtf/generator) [![Coverage Status](https://coveralls.io/repos/frameworkwtf/generator/badge.svg?branch=master&service=github)](https://coveralls.io/github/frameworkwtf/generator?branch=master)-->

Generates standard code for wtf modules.

Can generate following:

* Entity
* Controller
* Migration
* Seed
* Route
* Test
* CRUD (Controller, Entity, Migration, Route, Test with selected name in one command)

### Config

Place `generator.php` into any place

```php
<?php
$app = dirname(__DIR__).'/';
return [
    'paths' => [
        'app' => $app,
        'controller' => $app.'src/Controller/',
        'entity' => $app.'src/Entity/',
        'test' => $app.'tests/',
        'route' => $app.'config/routes/',
    ],
];
```

Run generator with: `bin/wtf generate:crud hello -c /path/to/generator-config.php`

### NOTE

1. **Generator is experiment project** (yet)
