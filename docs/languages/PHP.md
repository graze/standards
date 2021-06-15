# PHP Standards

1. All PHP code MUST adhere to the [PSR-2 Coding Standard](http://www.php-fig.org/psr/psr-2/) (which MUST follow the
   [PSR-1 Coding Standard](http://www.php-fig.org/psr/psr-1/)).
1. Short array syntax (`[]` instead of `array()`) MUST be used.
1. Associative arrays SHOULD be formatted without spaces as follows:
   ```
      $translations = [
         'and' => 'und',
         'Biotin' => 'Biotine',
         'Calcium' => 'Calcium',
         'Carbohydrate' => 'Koolhydraten'
      ];
   ```
   in comparison to with spaces as below
   ```
      $translations = [
         'and'          => 'und',
         'Biotin'       => 'Biotine',
         'Calcium'      => 'Calcium',
         'Carbohydrate' => 'Koolhydraten'
      ];
   ```
1. All PHP code MUST adhere to the [PSR-4 Autoloading](http://www.php-fig.org/psr/psr-4/) Standard.
1. Class names MUST be declared in UpperCamelCase.
    1. Acronyms MUST be treated as normal words. `HttpException`, not `HTTPException`.
1. Variable names MUST be declared in camelCase.
    1. Acronyms MUST be treated as normal words. `xmlHttpRequest` not `XMLHTTPRequest`.
1. Scripts MUST be named in camelCase describing their primary function.
1. Non-static functions MUST NOT be called statically.
1. Static functions MUST NOT be called non-statically.
1. Comments SHOULD be used to provide explanation for “why” rather than “how” and SHOULD be used when there isn’t a way
   to make the code simpler or self-documenting.
1. Nested ternary operators MUST NOT be used.
1. PHP file encoding must be UTF-8.
1. `if` statements which span multiple lines should be split as follows:

    ```php
    if ($longVariableNameNumber1
        && $longVariableNameNumber2
        && $longVariableNameNumber3
        && $longVariableNameNumber4
        || $longVariableNameNumber5) {
        // body of control structure
    }
    ```

1. There MUST NOT be any assignment or modification of variables in the expressions of `if` statements.

    ```php
    if ($response = $request->getResponse()) {
        // not allowed
    }
    ```

1. Abstract class names MUST begin with `Abstract`.

    ```php
    abstract class AbstractGenerator {
    }
    ```

1. Interface names MUST end with `Interface`.

    ```php
    interface GeneratorInterface {
    }
    ```

1. 'Not' logical operators MUST NOT have whitespace between them and the subject being negated.

    ```php
    $true = !false;
    ```

## PHP DocBlock

1. DocBlock for functions / methods MUST exist where the function / method has arguments or a return value and MUST use
   the appropriate tags (`@param`, `@return`) to denote that. Developers making modifications to a function / method are
   tasked with ensuring that the DocBlock is up-to-date.
1. Functions / methods / classes that are sufficiently complex (i.e. not self-documenting) SHOULD have a DocBlock
   explaining how to use the function / method / class.
1. DocBlock presenting the type MUST be present for class member variables.
1. When a description is necessary for class member variables, the DocBlock MUST be multiline:

    ```php
    class Foo
    {
        /** @var int */
        protected $id;

        /**
         * The Bar used to fight the foo
         *
         * @var Bar
         */
        private $bar;
    }
    ```

1. DocBlock types for scalar values MUST be one of: `bool` (not boolean), `int` (not integer), `string`, `float`
   (not double).
1. DocBlock types for parameters/return values that are arrays of a single type MUST be written as: `Type[]`. If the
   variable is a multi-dimensional array, it MUST be represented with one set of `[]` per depth (`int[][]` for an array
   of array of ints)
1. If the parameter/return value is an array of several types, it MUST be described in the DocBlock as `mixed[]`.
1. If the parameter/return value is an array that is sometimes empty, it MUST still be written as in 6)
   (NOT `Type[]|[]`)

### example of a method's DocBlock

```php
/**
 * Foos the bars.
 *
 * @param int   $barId      Some number
 * @param Bar[] $allTheBars Collection of Bar objects
 *
 * @return string[]         List of messages
 */
public function barFooer($barId, array $allTheBars) {}
```

## Open Source

* [Example skeleton project](https://github.com/graze/skeleton-projects)
* [League standards](http://thephpleague.com/#quality)
* [Checklist](http://phppackagechecklist.com/)

1. All code MUST adhere to the [PSR-2](http://www.php-fig.org/psr/psr-2/)
   and [PSR-4](http://www.php-fig.org/psr/psr-4/) standards.
1. The project MUST at least depend on the lowest supported PHP version and SHOULD depend on the latest fully supported
   PHP version (see [versions](https://php.net/supported-versions.php)).
1. The vendor name MUST be `graze`. The vendor namespace MUST be `Graze`.
1. The project MUST contain a composer.json file.
    1. It MUST contain:
        1. The name of the project, this MUST match the name of the repository.
        1. The name of the maintainer in the `authors` section, along with the generic
           `Graze Developers <developers@graze.com>` author.
    1. It MUST NOT contain:
        1. The version of the project.
1. All library code MUST be in a directory named `src/`.
1. All tests MUST be a in a directory named `tests/`.
1. The project SHOULD use Scrutinizer to check and fix standards and flag code quality issues.
1. The project MUST be listed on Packagist.
