<?php

class Graze_Sniffs_Commenting_MissingFunctionCommentSniff implements PHP_CodeSniffer_Sniff
{
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
     * @see    Tokens.php
     */
    public function register()
    {
        return [
            T_FUNCTION
        ];
    }

    /**
     * @param \PHP_CodeSniffer_File $phpcsFile
     * @param int $stackPtr
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $find   = PHP_CodeSniffer_Tokens::$methodPrefixes;
        $find[] = T_WHITESPACE;

        $commentEnd = $phpcsFile->findPrevious($find, ($stackPtr - 1), null, true);
        if ($tokens[$commentEnd]['code'] === T_COMMENT) {
            // Inline comments might just be closing comments for
            // control structures or functions instead of function comments
            // using the wrong comment type. If there is other code on the line,
            // assume they relate to that code.
            $prev = $phpcsFile->findPrevious($find, ($commentEnd - 1), null, true);
            if ($prev !== false && $tokens[$prev]['line'] === $tokens[$commentEnd]['line']) {
                $commentEnd = $prev;
            }
        }

        if ($tokens[$commentEnd]['code'] !== T_DOC_COMMENT_CLOSE_TAG
            && $tokens[$commentEnd]['code'] !== T_COMMENT
        ) {
            if (array_key_exists('scope_opener', $tokens[$stackPtr]) && $this->functionHasReturn($phpcsFile, $stackPtr)) {
                $phpcsFile->addError('Function has return keyword but no doc block', $stackPtr);
                return;
            }

            if ($this->functionHasParams($phpcsFile, $stackPtr)) {
                $phpcsFile->addError('Function has parameters but no doc block', $stackPtr);
            }
        }
    }

    /**
     * @param \PHP_CodeSniffer_File $phpcsFile
     * @param int $stackPtr
     *
     * @return bool
     */
    private function functionHasReturn(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
        $start = $tokens[$stackPtr]['scope_opener'];
        $end = $tokens[$stackPtr]['scope_closer'];

        for ($i = $start; $i <= $end; $i++) {
            if ($tokens[$i]['code'] === T_CLOSURE) {
                // skip over closures within our function
                $i = $tokens[$i]['scope_closer'];
            }

            // if we hit a return keyword that isn't immediately followed by a semicolon, we need a doc block
            if ($tokens[$i]['code'] === T_RETURN && $tokens[$i+1]['code'] !== T_SEMICOLON) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param PHP_CodeSniffer_File $phpcsFile
     * @param $stackPtr
     *
     * @return bool
     */
    private function functionHasParams(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        return (bool) $phpcsFile->getMethodParameters($stackPtr);
    }
}