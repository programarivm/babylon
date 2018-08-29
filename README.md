## Babylon

[![Build Status](https://travis-ci.org/programarivm/babylon.svg?branch=master)](https://travis-ci.org/programarivm/babylon)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

<p align="center">
	<img src="https://github.com/programarivm/babylon/blob/master/resources/languages.jpg" />
</p>

Babylon is the simplest, easiest-to-use language detector.

### Install

Via composer:

    $ composer require programarivm/babylon

### Instantiation

Just instantiate `Babylon` and detect the language of a text.

```php
<?php

use Babylon\Babylon;

$babylon = new Babylon;

$isoCode = $babylon->detect('Hi there, how are you today?');
```

### Documentation

For further information please read the [Documentation](https://babylon.readthedocs.io/en/latest/).

### License

The MIT License.

### Contributions

Would you help make this library better? Contributions are welcome.

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "Babylon Contributions"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)
- Say hello on [Google+](https://plus.google.com/+Programarivm)

Many thanks.
