# Graze Coding Standards

This document describes the coding standards of Graze across its common languages to be adhered to and enforced by the Graze tech team, any violation of standards must be justified by the developer and exceptions are allowed for cases where it is unavoidable, such as in the case of third-party integrations.

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and "OPTIONAL" in this document are to be interpreted as described in [RFC 2119](http://www.ietf.org/rfc/rfc2119.txt).

## General

1. Indent size MUST be 4 space characters and MUST NOT be the tab character.
2. All files MUST end with a blank new line (the new line character).
3. All files MUST use the Unix LF (linefeed) line ending.
4. There MUST NOT be trailing whitespace.

## PHP

1. All PHP code MUST adhere to the [PSR-2 Coding Standard](http://www.php-fig.org/psr/psr-2/) (which MUST follow the [PSR-1 Coding Standard](http://www.php-fig.org/psr/psr-1/)).
2. Short array syntax (`[]` instead of `array()`) SHOULD be used.
3. All PHP code MUST adhere to the [PSR-4 Autoloading](http://www.php-fig.org/psr/psr-4/) Standard.
4. Variable names MUST be camelCase and not snake_case or StUdLyCaSe or UpperCamelCase.
5. Scripts MUST be named in camelCase describing their primary function.
6. Non-static functions MUST NOT be called statically.
7. Static functions MUST NOT be called non-statically.
8. Comments SHOULD be used to provide explanation for “why” rather than “how” and SHOULD be used when there isn’t a way to make the code simpler or self-documenting.
9. Docblocks for functions / methods MUST exist where the function / method has arguments or a return value and MUST use the appropriate tags (@param, @return) to denote that. Developers making modifications to a function / method are tasked with ensuring that the docblock is up-to-date.
10. Functions / methods / classes that are sufficiently complex (i.e. not self-documenting) SHOULD have a docblock explaining how to use the function / method / class.
11. Code ‘hacks’ (code that is intended to be temporary and handles very specific cases) SHOULD NOT exist but should they have to occur with no way around them then the code that is ‘hacky’ MUST be accompanied with a comment explaining that it is a hack and explaining why it has to be there, including a @todo tag to explain what the developer needs to do to resolve the hack.
12. Standard library code MUST be as generic as possible and not application-specific.
13. Nested ternary operators MUST NOT be used.
14. PHP file encoding must be UTF-8.
15. If statements which need to span multiple lines should be split as follows:

  ```php
  if ($longVariableNameNumber1
    && $longVariableNameNumber2
    && $longVariableNameNumber3
    && $longVariableNameNumber4
    || $longVariableNameNumber5) {
    // body of control structure
  }
  ```

16. There MUST NOT be any assignment or modification of variables in the expressions of `if` statements.

  ```php
  if ($nutritionPlan = NutritionPlan::get(NutritionPlan::ID_NIBBLE)) {
    // not allowed
  }
  ```

17. If statements should check for type as well as what you are searching for.

  ```php
  if ($a === $b) {
    // Then do something
  }
  ```


## Views

1. MUST use the .phtml extension.
2. MUST be named in camelCase.
3. SHOULD be named after the controller action that they are the view for. E.g. the view for graze.com/account/payments must be in views/graze/en/account/payments.phtml.
4. PHP in views:
    1. MUST NOT modify the value of variables.
    2. MUST NOT reference static class properties, methods or constants.
    3. SHOULD NOT reference instance properties or methods, with the exception of the View instance.
    4. MAY reference PHP functions except where this conflicts with 4.i.

## Images

1. Words in image file names MUST be separated with hyphens (-).
2. Images SHOULD be compressed to the smallest possible size without compromising on clarity.
3. JPEG file format MUST be used only for an image that is or contains photography except in the case of (4).
4. PNG file format MUST be used for any image requiring transparency.

## HTML

1. HTML MUST be easily readable. The following guidelines are RECOMMENDED for increasing readability.
    1. No more than one tag per line.
    2. Correct indentation.
2. HTML SHOULD be using the HTML5 doctype.
3. Closing slashes MUST NOT be used on void elements. (img, br etc)
4. All tags and attributes MUST be in lowercase.
5. All attribute values MUST be enclosed by double-quotes.

## CSS / LESS

1. Words in file names MUST be separated with hyphens (-).
2. CSS3 is RECOMMENDED.
3. Selectors MUST be in hyphen case. (.button-blue).
4. Selectors MUST be on a single line, with a space after the last selector, followed by an opening brace. A selector MUST end with a closing brace that is un-indented and on a separate line. A blank line MUST be placed between each block of selectors.
5. There MUST only be one property:value pair per line.
6. CSS blocks SHOULD adhere to the CSS Property Order.
7. There MUST always be a space after a property's colon (e.g., display: block; and not display:block;).
8. Property declaration lines MUST end with a semi-colon.
9. For multiple, comma-separated selectors, each selector MUST be on its own line.
10. Attribute selectors, like input[type="text"] MUST always wrap the attribute's value in double quotes, for consistency and safety.
11. Attribute selectors MUST only be used where absolutely necessary (e.g., form controls) and MUST be avoided on custom components for performance and explicitness.
12. Series of classes for a component MUST include a base class (e.g., .component) and use the base class as a prefix for modifier and sub-components (e.g., .component-lg).

## JavaScript

1. JavaScript files / libraries MUST only depend on data attributes in the DOM.
2. Inline JavaScript inside a view MAY depend on the DOM.
3. JavaScript files / libraries MUST be under the Graze namespace and use sub-namespaces sensibly.
4. The dependencies of all JavaScript MUST be injected (jQuery, window, document etc).
5. JavaScript files MUST be named with words separated with hyphens (-).
6. JavaScript code MUST adhere to the Google JavaScript Style Guide.
7. JavaScript code MUST use the “use strict” mode.

## Python

1. Python code SHOULD conform to the PEP8 and PEP257 guides.


## SQL

### Query Writing
1. Keywords and functions MUST be uppercase (SELECT, WHERE, MAX)
2. Column aliases MUST be lower snake_case
3. When the SELECT, WHERE, GROUP BY or ORDER clauses contain more than one element, they MUST be on a new line after the keyword, indented once:

    ```sql
    SELECT
        ap_first_name,
        ap_last_name
    FROM account_profile
    WHERE
        ap_id = 321142
        AND ap_email <> 'bill@microsoft.com'
    ```
4. When a SELECT, WHERE, GROUP BY or ORDER clause only contains one element, it MAY all be written on the same line for brevity:

    ```sql
    SELECT
        ap_first_name,
        ap_last_name
    FROM account_profile
    WHERE ap_id = 321142
    ```
5. When a statement is written within a string in PHP:
    1. The query MUST start on a new line, indented once
    2. A semicolon MUST NOT be added at the end of the statement
6. All JOINs MUST be written as such:

    ```sql
    INNER JOIN table_name
        ON condition1
        AND condition2
    ```

7. Functions MAY be split across multiple lines, where each subsequent line is indented once. When doing so, the first item in the list MUST be on the next line, and there MUST be only one argument per line.

    ```sql
    SELECT
       CONCAT(
           ap_first_name,
           ' ',
           ap_last_name
       ) full_name
    FROM account_profile
    ```

8. CASE statements MAY either be written using the previous rule or on a single line:
    * split lines
        ```sql
        SELECT
           CASE
               WHEN ap_gender = 'M' THEN 'male'
               WHEN ap_gender = 'F' THEN 'female'
               ELSE 'unknown'
           END
       ```

    * concisely
    ```sql
        SELECT
           CASE WHEN ap_gender = 'M' THEN 'male' ELSE 'female' END
        FROM account_profile
        ```

9. Subqueries MUST be started on the next line and indented once; the opening brace MUST be on the same line as the FROM clause, and the closing brace MUST be on its own line along with the subquery alias:

    ```sql
    SELECT
       my_subquery.*
    FROM (
       SELECT
           ap_first_name first_name,
           COUNT(*) count_names
       FROM account_profile
       GROUP BY ap_first_name
    ) my_subquery
    ```
