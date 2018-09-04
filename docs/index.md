## Babylon

[![Build Status](https://travis-ci.org/programarivm/babylon.svg?branch=master)](https://travis-ci.org/programarivm/babylon)
[![Documentation Status](https://readthedocs.org/projects/babylon/badge/?version=latest)](https://babylon.readthedocs.io/en/latest/?badge=latest)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

<p align="center">
	<img src="https://github.com/programarivm/babylon/blob/master/resources/languages.jpg" />
</p>

Babylon is the simplest, easiest-to-use language detector.

### Install

Via composer:

    $ composer require programarivm/babylon

### Instantiation

Instantiate a `LanguageDetector` to detect a text's language.

```php
<?php

use Babylon\LanguageDetector;

$text = 'You will have your data soon, I remarked, pointing with my finger;
		this is the Brixton Road, and that is the house, if I am not very much
		mistaken.';

$isoCode = (new LanguageDetector($text))->detect();
```

> Note: The text needs to be a few words length in order for the language to be detected correctly; otherwise false positives may take place.

### Language Detection

Babylon implements a machine learning technique and can be trained to learn languages easily. Please read the [Documentation](https://babylon.readthedocs.io/en/latest/) to find out which ones can be detected so far.

### License

The MIT License.

### Contributions

Would you help make this library better? Contributions are welcome.

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "Babylon Contributions"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)
- Say hello on [Google+](https://plus.google.com/+Programarivm)

Many thanks.
