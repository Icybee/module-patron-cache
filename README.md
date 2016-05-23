# Patron cache

[![Release](https://img.shields.io/packagist/v/icybee/module-patron-cache.svg)](https://packagist.org/packages/icybee/module-patron-cache)
[![Build Status](https://img.shields.io/travis/Icybee/module-patron-cache/master.svg)](http://travis-ci.org/Icybee/module-patron-cache)
[![HHVM](https://img.shields.io/hhvm/icybee/module-patron-cache.svg)](http://hhvm.h4cc.de/package/icybee/module-patron-cache)
[![Code Quality](https://img.shields.io/scrutinizer/g/Icybee/module-patron-cache/master.svg)](https://scrutinizer-ci.com/g/Icybee/module-patron-cache)
[![Code Coverage](https://img.shields.io/coveralls/Icybee/module-patron-cache/master.svg)](https://coveralls.io/r/Icybee/module-patron-cache)
[![Packagist](https://img.shields.io/packagist/dt/icybee/module-patron-cache.svg)](https://packagist.org/packages/icybee/module-patron-cache)

Cache rendered patron fragments.

## The `p:cache` markup

Cache the rendered templates. The cache key is computed from the enclosed template and the subject
value.

```html
<p:cache>
    <!-- Content: template -->
</p:cache>
```






----------





## Requirements

The package requires PHP 5.5 or later.





## Installation

The recommended way to install this package is through [Composer](http://getcomposer.org/):

```
$ composer require icybee/module-patron-cache
```





### Cloning the repository

The package is [available on GitHub](https://github.com/Icybee/module-patron-cache), its repository can be
cloned with the following command line:

	$ git clone https://github.com/Icybee/module-patron-cache.git articles





## Documentation

The documentation for the package and its dependencies can be generated with the `make doc`
command. The documentation is generated in the `docs` directory using [ApiGen](http://apigen.org/).
The package directory can later by cleaned with the `make clean` command.





## Testing

The test suite is ran with the `make test` command. [PHPUnit](https://phpunit.de/) and [Composer](http://getcomposer.org/) need to be globally available to run the suite. The command installs dependencies as required. The `make test-coverage` command runs test suite and also creates an HTML coverage report in "build/coverage". The directory can later be cleaned with the `make clean` command.

The package is continuously tested by [Travis CI](http://about.travis-ci.org/).

[![Build Status](https://img.shields.io/travis/Icybee/module-patron-cache/master.svg)](https://travis-ci.org/Icybee/module-patron-cache)
[![Code Coverage](https://img.shields.io/coveralls/Icybee/module-patron-cache/master.svg)](https://coveralls.io/r/Icybee/module-patron-cache)





## License

**icybee/module-patron-cache** is licensed under the New BSD License. See the [LICENSE](LICENSE) file for details.
