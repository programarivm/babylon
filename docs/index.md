## Babylon

[![Build Status](https://travis-ci.org/programarivm/babylon.svg?branch=master)](https://travis-ci.org/programarivm/babylon)
[![Documentation Status](https://readthedocs.org/projects/babylon/badge/?version=latest)](https://babylon.readthedocs.io/en/latest/?badge=latest)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

Babylon is the simplest, easiest-to-use language detector.

### Install

Via composer:

    $ composer require programarivm/babylon

### Instantiation

This is how to detect the language of a text:

```php
use Babylon\LanguageDetector;

$text = 'You will have your data soon, I remarked, pointing with my finger;
		this is the Brixton Road, and that is the house, if I am not very much
		mistaken.';

$isoCode = (new LanguageDetector())->detect($text);
```

To detect the language family of a text:

```php
use Babylon\FamilyDetector;

$text = 'You will have your data soon, I remarked, pointing with my finger;
		this is the Brixton Road, and that is the house, if I am not very much
		mistaken.';

$family = (new FamilyDetector())->detect($text);
```

### Languages Detected

### Languages Detected

| ISO 639-3       | Language               |
|-----------------|------------------------|
| `afr`           | Afrikaans              |
| `arb`           | Arabic                 |
| `bel`           | Belarusian             |
| `ben`           | Bengali                |
| `bul`           | Bulgarian              |
| `cat`           | Catalan                |
| `ceb`           | Cebuano                |
| `ces`           | Czech                  |
| `cym`           | Welsh                  |
| `dan`           | Danish                 |
| `deu`           | German                 |
| `ell`           | Greek                  |
| `eng`           | English                |
| `est`           | Estonian               |
| `eus`           | Basque                 |
| `fas`           | Persian                |
| `fij`           | Fijian                 |
| `fin`           | Finnish                |
| `fra`           | French                 |
| `gla`           | Scottish Gaelic        |
| `gle`           | Irish                  |
| `glg`           | Galician               |
| `guj`           | Gujarati               |
| `heb`           | Hebrew                 |
| `hin`           | Hindi                  |
| `hrv`           | Croatian               |
| `hun`           | Hungarian              |
| `ita`           | Italian                |
| `isl`           | Icelandic              |
| `jav`           | Javanese               |
| `jpn`           | Japanese               |
| `kan`           | Kannada                |
| `khm`           | Khmer                  |
| `kor`           | Korean                 |
| `lit`           | Lithuanian             |
| `lvs`           | Latvian                |
| `mri`           | Maori                  |
| `nld`           | Dutch; Flemish         |
| `nob`           | Norwegian              |
| `pan`           | Punjabi (Gurmukhi)     |
| `pol`           | Polish                 |
| `por`           | Portuguese             |
| `ron`           | Romanian               |
| `rus`           | Russian                |
| `smo`           | Samoan                 |
| `spa`           | Spanish                |
| `swe`           | Swedish                |
| `swh`           | Swahili                |
| `tam`           | Tamil                  |
| `tel`           | Telugu                 |
| `tgl`           | Tagalog                |
| `tur`           | Turkish                |
| `ukr`           | Ukranian               |
| `urd`           | Urdu                   |
| `vie`           | Vietnamese             |
| `yor`           | Yoruba                 |
| `zho`           | Chinese                |
| `zul`           | Zulu                   |

### Would You Want to Help Add More Languages?

Babylon implements a machine learning technique and can be trained to learn languages easily. Please read the [Documentation](https://babylon.readthedocs.io/en/latest/) to find out how you can help add more languages.

### License

The MIT License.

### Contributions

Would you help make this library better? Contributions are welcome.

- Feel free to send a pull request
- Drop an email at info@programarivm.com with the subject "Babylon Contributions"
- Leave me a comment on [Twitter](https://twitter.com/programarivm)

Many thanks.
