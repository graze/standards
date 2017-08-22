# Graze Coding Standards

This document describes the coding standards of Graze across its common languages to be adhered to and enforced by the Graze tech team, any violation of standards must be justified by the developer and exceptions are allowed for cases where it is unavoidable, such as in the case of third-party integrations.

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and "OPTIONAL" in this document are to be interpreted as described in [RFC 2119](http://www.ietf.org/rfc/rfc2119.txt).

## General

1. Indent size MUST be 4 space characters and MUST NOT be the tab character.
1. All files MUST end with a blank new line (the new line character).
1. All files MUST use the Unix LF (linefeed) line ending.
1. There MUST NOT be trailing whitespace.

## Git

1. Repo names SHOULD be all lowercase with hyphens (-) to separate words where appropriate.
1. Internal-only libraries SHOULD be prefixed with "graze-".
1. It is RECOMMENDED to follow the style guide mantained in [agis-/git-style-guide](https://github.com/agis-/git-style-guide).

## PHP

1. All PHP code MUST adhere to the [PSR-2 Coding Standard](http://www.php-fig.org/psr/psr-2/) (which MUST follow the [PSR-1 Coding Standard](http://www.php-fig.org/psr/psr-1/)).
1. Short array syntax (`[]` instead of `array()`) MUST be used.
1. All PHP code MUST adhere to the [PSR-4 Autoloading](http://www.php-fig.org/psr/psr-4/) Standard.
1. Class names MUST be declared in UpperCamelCase.
    1. Acronyms MUST be treated as normal words. `HttpException`, not `HTTPException`.
1. Variable names MUST be declared in camelCase.
    1. Acronyms MUST be treated as normal words. `xmlHttpRequest` not `XMLHTTPRequest`.
1. Scripts MUST be named in camelCase describing their primary function.
1. Non-static functions MUST NOT be called statically.
1. Static functions MUST NOT be called non-statically.
1. Comments SHOULD be used to provide explanation for “why” rather than “how” and SHOULD be used when there isn’t a way to make the code simpler or self-documenting.
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

### PHP DocBlock

1. DocBlock for functions / methods MUST exist where the function / method has arguments or a return value and MUST use the appropriate tags (`@param`, `@return`) to denote that. Developers making modifications to a function / method are tasked with ensuring that the DocBlock is up-to-date.
1. Functions / methods / classes that are sufficiently complex (i.e. not self-documenting) SHOULD have a DocBlock explaining how to use the function / method / class.
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

1. DocBlock types for scalar values MUST be one of: `bool` (not boolean), `int` (not integer), `string`, `float` (not double).
1. DocBlock types for parameters/return values that are arrays of a single type MUST be written as: `Type[]`. If the variable is a multi-dimensional array, it MUST be represented with one set of `[]` per depth (`int[][]` for an array of array of ints)
1. If the parameter/return value is an array of several types, it MUST be described in the DocBlock as `mixed[]`.
1. If the parameter/return value is an array that is sometimes empty, it MUST still be written as in 6) (NOT `Type[]|[]`)

**example of a method's DocBlock:**

```php
    /**
     * Foos the bars.
     *
     * @param int $barId Some number
     * @param Bar[] $allTheBars Collection of Bar objects
     * @return string[] List of messages
     */
    public function barFooer($barId, array $allTheBars) {}
```

## Views

1. MUST use the .phtml extension.
1. MUST be named in camelCase.
1. SHOULD be named after the controller action that they are the view for. E.g. the view for graze.com/account/payments must be in views/graze/en/account/payments.phtml.
1. PHP in views:
    1. MUST NOT modify the value of variables.
    1. MUST NOT reference static class properties, methods or constants.
    1. SHOULD NOT reference instance properties or methods, with the exception of the View instance.
    1. MAY reference PHP functions except where this conflicts with 4.i.

## Images

1. Words in image file names MUST be separated with hyphens (-).
1. Images SHOULD be compressed to the smallest possible size without compromising on clarity.
1. JPEG file format MUST be used only for an image that is or contains photography except in the case of (4).
1. PNG file format MUST be used for any image requiring transparency.

## HTML

1. HTML MUST be easily readable. The following guidelines are RECOMMENDED for increasing readability.
    1. No more than one tag per line.
    1. Correct indentation.
1. HTML SHOULD be using the HTML5 doctype.
1. Closing slashes MUST NOT be used on void elements. (img, br etc)
1. All tags and attributes MUST be in lowercase.
1. All attribute values MUST be enclosed by double-quotes.

## CSS / LESS

1. Words in file names MUST be separated with hyphens (-).
1. CSS3 is RECOMMENDED.
1. Selectors MUST be in hyphen case. (.button-blue).
1. Selectors MUST be on a single line, with a space after the last selector, followed by an opening brace. A selector MUST end with a closing brace that is un-indented and on a separate line. A blank line MUST be placed between each block of selectors.
1. There MUST only be one property:value pair per line.
1. CSS blocks SHOULD adhere to the CSS Property Order.
1. There MUST always be a space after a property's colon (e.g., display: block; and not display:block;).
1. Property declaration lines MUST end with a semi-colon.
1. For multiple, comma-separated selectors, each selector MUST be on its own line.
1. Attribute selectors, like input[type="text"] MUST always wrap the attribute's value in double quotes, for consistency and safety.
1. Attribute selectors MUST only be used where absolutely necessary (e.g., form controls) and MUST be avoided on custom components for performance and explicitness.
1. Series of classes for a component MUST include a base class (e.g., .component) and use the base class as a prefix for modifier and sub-components (e.g., .component-lg).

## JavaScript

Please refer to the [airbnb style guide](https://github.com/airbnb/javascript) for styling standards, **in particular**:

- [Variables](https://github.com/airbnb/javascript#variables)
- [jQuery](https://github.com/airbnb/javascript#jquery)
- [Commas](https://github.com/airbnb/javascript#commas)
- [Objects](https://github.com/airbnb/javascript#objects)
- [Arrays](https://github.com/airbnb/javascript#arrays)
- [Strings](https://github.com/airbnb/javascript#strings)
- [Functions](https://github.com/airbnb/javascript#functions)

### Immediately-invoked function expressions (IIFE)

1. MUST NOT be used for CommonJS exporting modules (built with Browserify)
1. MUST be used in inline scripts and non Browserify compiled JS to avoid populating the global scope

**Example of usage in non CommonJS modules:**

```javascript
(function($) {
    console.log($);
    // Defined as long as global jQuery object is available
})(jQuery);

console.log($);
// Undefined
```

## Python

1. Python code SHOULD conform to the PEP8 and PEP257 guides
1. Exceptions:
    1. 160 column limit

## AWS

### DNS Names

DNS Records MUST adhere to the following pattern

```text
(instance).aws_service.(az).(region).service.environment.namespace
```

1. `instance` SHALL be used in the case that there are multiple instances of an aws_service, e.g. seperate databases.
1. `aws_service` MUST refer to the specific AWS service that is being used, the correct name of a AWS service MUST be as specified as in the [Boto3 Library](https://boto3.readthedocs.io/en/latest/reference/services/index.html)
1. `az` OPTIONALLY can refer to a specific Availability Zone. This may indicate a design problem in the service.
1. `region` OPTIONALLY can refer to a specific region.
1. `service` MUST refer to the specific service.
1. `environment` MUST refer to the environment the service is deployed into (`dev`, `stage`, `test`, `live`)
1. `namespace` MUST be a valid TLD

Example DNS Records:

```text
exampledb.rds.eu-west-1.example-service.environment.example.com
elasticache.us-west-1.second-service.environment.example.com
```

### Object Names in AWS

1. The name of an Object in AWS must convey the same information at the DNS record, however availability zone and region SHOULD NOT be included as this information is conveyed by interaction with the object.
1. The Object name is ordered naturally so that it is read from left to right (inverse of the DNS name).
1. By convention the namespace is assumed to be the standard TLD. Exceptions MAY be made for third party services.
1. Objects MUST be UpperCamelCase and acronyms MUST be Capitalised.

Example Object Names:

```text
EnvironmentExampleServiceRDSExampleDB
EnvironmentSecondServiceElastiCache
ThirdPartyLiveMonitoringEC2
```

## SQL

### Query Writing

1. Keywords and functions MUST be uppercase (SELECT, WHERE, MAX, AND)
1. Column aliases MUST be lower snake_case
1. When the SELECT, WHERE, GROUP BY or ORDER clauses contain more than one element, they MUST be on a new line after the keyword, indented once:

    ```sql
    SELECT
        first_name,
        last_name
    FROM users
    WHERE
        username = 'sxybill9'
        AND email <> 'bill@microsoft.com'
    ```

1. When a SELECT, WHERE, GROUP BY or ORDER clause only contains one element, it MAY all be written on the same line for brevity:

    ```sql
    SELECT
        first_name,
        last_name
    FROM users
    WHERE id = 321142
    ```

1. When a statement is written within a string in PHP:
    1. The query MUST start on a new line, indented once
    1. A semicolon MUST NOT be added at the end of the statement
1. All joins MUST be written like:

    ```sql
    INNER JOIN table_name
        ON condition1
        AND condition2
    ```
    Joins MUST NOT use the unqualified JOIN keyword.

1. Functions MAY be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument per line.

    ```sql
    SELECT
        CONCAT(
            first_name,
            ' ',
            last_name
        ) full_name
    FROM users
    ```

1. CASE statements MAY either be written using the previous rule or on a single line:
    - split lines

        ```sql
        SELECT
            CASE
                WHEN gender = 'M' THEN 'male'
                WHEN gender = 'F' THEN 'female'
                ELSE 'not provided'
            END
       ```

    - concisely

        ```sql
        SELECT
            CASE WHEN gender = 'M' THEN 'male' ELSE 'female' END
        FROM users
        ```

1. Subqueries MUST be started on the next line and indented once; the opening brace MUST be on the same line as the FROM clause, and the closing brace MUST be on its own line along with the subquery alias:

    ```sql
    SELECT
        my_subquery.*
    FROM (
        SELECT
            prenom first_name,
            COUNT(*) count_names
        FROM users
        GROUP BY prenom
    ) my_subquery
    ```
