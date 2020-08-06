<?php

namespace Graze\Sniffs\ControlStructures;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;

/**
 * Implements the following rule:
 *
 * 'Not' logical operators MUST NOT have whitespace between them and the subject being negated.
 */
class NegationNoSpacesSniff implements Sniff
{
    const ERROR_CODE = 'Graze.ControlStructures.NegationNoSpaces';

    /**
     * @return int[]
     */
    public function register()
    {
        return [
            T_BOOLEAN_NOT
        ];
    }

    /**
     * @param File $phpcsFile The PHP_CodeSniffer file where the
     *        token was found.
     * @param int $stackPtr The position in the PHP_CodeSniffer
     *        file's token stack where the token was found.
     */
    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr + 1]['code'] === T_WHITESPACE) {
            $phpcsFile->addError('Space found after logical NOT operator', $stackPtr + 1, self::ERROR_CODE);
        }
    }
}
