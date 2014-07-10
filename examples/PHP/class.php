<?php

namespace Graze\Example; // namespace declaration with blank line above

use Graze\Lib\Foo; // use statements with blank line above

class Example
{
    /**
     * @var Foo
     */
    protected $foo;

    /**
     * @param Foo $foo
     */
    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    /**
     * @return Foo
     */
    public function getFoo()
    {
        return $this->foo;
    }

    /**
     * @param Foo $foo
     * @param string $bar
     * @param string $baz
     * @param string $bat
     */
    public function methodWithManyArguments(
        Foo $foo,
        $bar,
        $baz,
        $bat = null,
        $bak = null,
        $bas = null,
        $bab = null,
        $bap = null,
        $bad = null
    ) {
        // delcare a method with too many arguments for one line
    }

    protected function protectedSomething()
    {
        // no leading hyphen for protected method names

        // calling a method with too many arguments for an 80 character line
        $this->methodWithManyArguments(
            new Foo(),
            'bar',
            'baz',
            'bat',
            'bak',
            'bas',
            'bab',
            'bap',
            'bad'
        );
    }

    private function privateSomething()
    {
        // no leading hyphen for private method names
    }
}
