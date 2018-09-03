<?php

namespace Babylon;

use Babylon\Exception\FileCharacterEncodingException;

/**
 * Abstract file.
 *
 * @author Jordi Bassagañas <info@programarivm.com>
 * @link https://programarivm.com
 * @license MIT
 */
abstract class AbstractFile
{
    /**
     * Filepath.
     *
     * @var string
     */
    protected $filepath;

    /**
     * Constructor.
     *
     * @param string $filepath
     */
    public function __construct(string $filepath)
    {
        $content = file_get_contents($filepath);
        $encoding = mb_detect_encoding($content);
        if ($encoding !== 'ASCII' && $encoding !== 'UTF-8') {
            throw new FileCharacterEncodingException(
                "Character encoding detected: $encoding. Must be UTF-8."
            );
        }

        $this->filepath = $filepath;
    }
}
