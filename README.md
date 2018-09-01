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

### Languages Detected

| ISO 639-3 Code  | Language               |
|-----------------|------------------------|
| `ceb`           | Cebuano                |
| `ces`           | Czech                  |
| `cym`           | Welsh                  |
| `dan`           | Danish                 |
| `deu`           | German                 |
| `eng`           | English                |
| `fin`           | Finnish                |
| `fra`           | French                 |
| `gla`           | Scottish Gaelic        |
| `gle`           | Irish                  |
| `hun`           | Hungarian              |
| `ita`           | Italian                |
| `isl`           | Icelandic              |
| `nld`           | Dutch; Flemish         |
| `nob`           | Norwegian              |
| `pol`           | Polish                 |
| `por`           | Portuguese             |
| `ron`           | Romanian               |
| `spa`           | Spanish                |
| `swe`           | Swedish                |
| `tgl`           | Tagalog                |

### License

The MIT License.

### Contributions

Would you help make this library better? Contributions are welcome.

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "Babylon Contributions"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)
- Say hello on [Google+](https://plus.google.com/+Programarivm)

Many thanks.
