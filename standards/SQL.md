# SQL

## Query Writing

1. Keywords and functions MUST be uppercase (SELECT, WHERE, MAX, AND).
1. Column aliases MUST be lower snake_case.
1. When the SELECT, WHERE, GROUP BY or ORDER clauses contain more than one element, they MUST be on a new line after
   the keyword, indented once:

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
    1. The query MUST start on a new line, indented once.
    1. A semicolon MUST NOT be added at the end of the statement.
1. All joins MUST be written like:

    ```sql
    INNER JOIN table_name
        ON condition1
        AND condition2
    ```
    Joins MUST NOT use the unqualified JOIN keyword.

1. Functions MAY be split across multiple lines, where each subsequent line is indented once. When doing so, the first
   item in the list MUST be on the next line, and there MUST be only one argument per line.

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

1. Subqueries MUST be started on the next line and indented once; the opening brace MUST be on the same line as the
   FROM clause, and the closing brace MUST be on its own line along with the subquery alias:

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
