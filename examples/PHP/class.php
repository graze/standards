<?php

namespace Graze\Example; // namespace declaration with blank line above

use Graze\Lib\Foo; // use statements with blank line above

class Example
{
    /**
     * @var \Graze\Lib\Foo
     */
    protected $foo;

    /**
     * @param \Graze\Lib\Foo $foo
     */
    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    /**
     * @return \Graze\Lib\Foo
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
        $bat = null
    ) {
        // delcare a method with too many arguments for one line
    }

    protected function protectedSomething()
    {
        // no leading hyphen for protected method names

        // calling a method with too many arguments for one line
        $this->methodWithManyArguments(
            new Foo(),
            'bar',
            'baz',
            'bat'
        );
    }

    private function privateSomething()
    {
        // no leading hyphen for private method names
    }
}
