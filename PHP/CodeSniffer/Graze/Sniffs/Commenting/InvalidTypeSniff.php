<?php

namespace Graze\Sniffs\Commenting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

class InvalidTypeSniff implements Sniff
{
    const ERROR_CODE = 'graze.commenting.invalidType';
    /**
     * @var array
     */
    private static $types = [
        'boolean' => 'bool',
        'integer' => 'int'
    ];

    /**
     * Registers the tokens that this sniff wants to listen for.
     * An example return value for a sniff that wants to listen for whitespace
     * and any comments would be:
     * <code>
     *    return array(
     *            T_WHITESPACE,
     *            T_DOC_COMMENT,
     *            T_COMMENT,
     *           );
     * </code>
     * @return int[]
     */
    public function register()
    {
        return [
            T_FUNCTION,
        ];
    }

    /**
     * @param File $phpcsFile
     * @param int $stackPtr
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $commentToken = [
            T_COMMENT,
            T_DOC_COMMENT_CLOSE_TAG,
        ];

        $commentEnd = $phpcsFile->findPrevious($commentToken, $stackPtr);

        if (! $commentEnd) {
            return;
        }

        if (! array_key_exists('comment_opener', $tokens[$commentEnd])) {
            return;
        }

        $commentStart = $tokens[$commentEnd]['comment_opener'];

        foreach ($tokens[$commentStart]['comment_tags'] as $tag) {
            if ($tokens[$tag]['content'] === '@param' || $tokens[$tag]['content'] === '@return') {
                $type = $tokens[($tag + 2)]['content'];
                $typeBits = explode(' ', $type);
                $type = array_shift($typeBits);

                if (array_key_exists($type, static::$types)) {
                    $fix = $phpcsFile->addFixableError('Type should be \'' . static::$types[$type] . '\' not \'' . $type . '\'', $tag, static::ERROR_CODE);
                    if ($fix) {
                        $content = trim(static::$types[$type] . ' ' . implode(' ', $typeBits));
                        $phpcsFile->fixer->replaceToken(($tag + 2), $content);
                    }
                }
            }
        }
    }
}
