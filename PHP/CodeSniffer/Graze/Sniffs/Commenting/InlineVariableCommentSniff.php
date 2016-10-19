<?php

namespace Graze\Sniffs\Commenting;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\AbstractVariableSniff;

class InlineVariableCommentSniff extends AbstractVariableSniff
{
    const ERROR_CODE = 'graze.commenting.inlineVariableComment';
    /**
     * Called to process class member vars.
     *
     * @param File $phpcsFile The PHP_CodeSniffer file where this
     *                                        token was found.
     * @param int $stackPtr The position where the token was found.
     *
     * @return void
     */
    protected function processMemberVar(
        File $phpcsFile,
        $stackPtr
    ) {
        $tokens       = $phpcsFile->getTokens();
        $commentToken = array(
            T_COMMENT,
            T_DOC_COMMENT_CLOSE_TAG,
        );
        $commentEnd = $phpcsFile->findPrevious($commentToken, $stackPtr);
        $commentStart = $tokens[$commentEnd]['comment_opener'];

        if ($tokens[$commentEnd]['line'] === $tokens[$commentStart]['line']) {
            $phpcsFile->addError('Member variable comment should not be inline', $stackPtr, static::ERROR_CODE);
        }
    }

    /**
     * Called to process normal member vars.
     *
     * @param File $phpcsFile The PHP_CodeSniffer file where this
     *                                        token was found.
     * @param int $stackPtr The position where the token was found.
     *
     * @return void
     */
    protected function processVariable(
        File $phpcsFile,
        $stackPtr
    ) {
    }

    /**
     * Called to process variables found in double quoted strings or heredocs.
     * Note that there may be more than one variable in the string, which will
     * result only in one call for the string or one call per line for heredocs.
     *
     * @param File $phpcsFile The PHP_CodeSniffer file where this
     *                                        token was found.
     * @param int $stackPtr The position where the double quoted
     *                                        string was found.
     *
     * @return void
     */
    protected function processVariableInString(
        File $phpcsFile,
        $stackPtr
    ) {
    }
}
