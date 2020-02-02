## Adding Languages

Babylon implements a machine learning technique and can be trained to learn languages easily.

### One-to-Many

The following explanation is valid for alphabets such as Cyrillic and Latin where there is let's say a one-to-many correspondence between such alphabet and the language families using it.

| Alphabet        | Family                 | ISO 639-3       |           
|-----------------|------------------------|-----------------|
| Cyrillic        | Slavic                 | `bul`           |
| Cyrillic        | Slavic                 | `hrv`           |
| Cyrillic        | Slavic                 | `rus`           |
| ...             | ...                    | ...             |
| Latin           | Austronesian           | `ceb`           |
| Latin           | Austronesian           | `tgl`           |
| Latin           | Gaelic                 | `cym`           |
| Latin           | Gaelic                 | `gla`           |
| Latin           | Gaelic                 | `gle`           |
| Latin           | Germanic               | `dan`           |
| Latin           | Germanic               | `deu`           |
| Latin           | Germanic               | `eng`           |
| ...             | ...                    | ...             |

In such cases, find a public domain text written in the language you'd want to add and copy/paste it into the `input` folder.

> **Important**: The text must be copypasted into the right `alphabet/family` folder; otherwise the training of the model won't work properly.

So for example, let's say we want to teach Babylon the Cebuano language. Then a `ceb.txt` file needs to be copy and pasted into the `babylon/dataset/input/alphabet/latin/austronesian/` folder.

> **Note**: By convention, the ISO 639-3 is used when naming the new `txt` file: `ceb.txt`

Then, run the command:

```
php cli/prepare.php
This will create a CSV with the most frequent words in all of the files in the dataset/input folder.
The operation may take a few seconds to be completed.
Do you want to proceed? (Y/N): y
OK! The most frequent words in ceb.txt were transformed into CSV format...
OK! The most frequent words in tgl.txt were transformed into CSV format...
The austronesian language family has been updated.
OK! The most frequent words in cym.txt were transformed into CSV format...
OK! The most frequent words in gla.txt were transformed into CSV format...
OK! The most frequent words in gle.txt were transformed into CSV format...
The gaelic language family has been updated.
OK! The most frequent words in dan.txt were transformed into CSV format...
OK! The most frequent words in deu.txt were transformed into CSV format...
OK! The most frequent words in eng.txt were transformed into CSV format...
OK! The most frequent words in isl.txt were transformed into CSV format...
OK! The most frequent words in nld.txt were transformed into CSV format...
OK! The most frequent words in nob.txt were transformed into CSV format...
OK! The most frequent words in swe.txt were transformed into CSV format...
The germanic language family has been updated.
OK! The most frequent words in fra.txt were transformed into CSV format...
OK! The most frequent words in ita.txt were transformed into CSV format...
OK! The most frequent words in por.txt were transformed into CSV format...
OK! The most frequent words in ron.txt were transformed into CSV format...
OK! The most frequent words in spa.txt were transformed into CSV format...
The romance language family has been updated.
OK! The most frequent words in ces.txt were transformed into CSV format...
OK! The most frequent words in pol.txt were transformed into CSV format...
The slavic language family has been updated.
OK! The most frequent words in bul.txt were transformed into CSV format...
OK! The most frequent words in hrv.txt were transformed into CSV format...
OK! The most frequent words in rus.txt were transformed into CSV format...
The slavic language family has been updated.
OK! The most frequent words in fin.txt were transformed into CSV format...
OK! The most frequent words in hun.txt were transformed into CSV format...
The uralic language family has been updated.
OK! The words in slavic.csv were successfully read...
OK! cyrillic-fingerprint.csv was successfully written...
Operation completed.
OK! The words in austronesian.csv were successfully read...
OK! The words in gaelic.csv were successfully read...
OK! The words in germanic.csv were successfully read...
OK! The words in romance.csv were successfully read...
OK! The words in slavic.csv were successfully read...
OK! The words in uralic.csv were successfully read...
OK! latin-fingerprint.csv was successfully written...
Operation completed.
```

That's it! The `cli/prepare.php` command calculates some statistics: the fingerprint of the language families which is a disjointish set containing the most frequent words expected to be found in each family of languages.

Example: [babylon/dataset/output/latin-fingerprint.csv](https://github.com/programarivm/babylon/blob/master/dataset/output/latin-fingerprint.csv)

Finally I'd suggest to write a test to make sure the new language is properly detected.

In a nutshell, this is a three-step process:

1. Copypaste `ceb.txt` in `babylon/dataset/input/latin/austronesian`
2. Run php `cli/prepare.php`
3. Write a test to make sure the language is recognized

Example:

- [the Cebuano language is taught to Babylon #14](https://github.com/programarivm/babylon/pull/14/files)

### One-to-One

In alphabets such as Telugu or Hangul (Korean alphabet) there is a one-to-one correspondence between the alphabet and the language.

| Alphabet        | ISO 639-3       |           
|-----------------|-----------------|
| Telugu          | `tel`           |

This scenario is easier than the previous one since there isn't any data preparation involved. No machine learning stuff, just tweak the `src/Detector/LanguageDetector.php` file as it is shown in [Babylon is taught the Telugu language](https://github.com/programarivm/babylon/pull/19/files).

This is a two-step process:

1. Tweak the `src/Detector/LanguageDetector.php` file
2. Write a test to make sure the language is recognized
