# Graze Coding Standards

This [documentation](https://graze.github.io/standards) is also available in mkdocs.

This document describes the coding standards of Graze across its common languages to be adhered to and enforced by the
Graze tech team, any violation of standards must be justified by the developer and exceptions are allowed for cases
where it is unavoidable, such as in the case of third-party integrations.

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and
"OPTIONAL" in this document are to be interpreted as described in [RFC 2119](http://www.ietf.org/rfc/rfc2119.txt).

## General

1. Indent size MUST be 4 space characters and MUST NOT be the tab character.
1. All files MUST end with a blank new line (the new line character).
1. All files MUST use the Unix LF (linefeed) line ending.
1. There MUST NOT be trailing whitespace.

## Git

1. Repo names SHOULD be all lowercase with hyphens (-) to separate words where appropriate.
1. Internal-only libraries SHOULD be prefixed with "graze-".
1. It is RECOMMENDED to follow the style guide mantained in [agis-/git-style-guide](https://github.com/agis-/git-style-guide).

## Languages

1. [PHP](docs/languages/PHP.md)
1. [HTML](docs/languages/HTML.md)
1. [Javascript](docs/languages/Javascript.md)
1. [Python](docs/languages/Python.md)
1. [SQL](docs/languages/SQL.md)
1. [CSS/Less](docs/languages/CSS.md)
1. [Markdown](docs/languages/Markdown.md)
1. [Golang](docs/languages/Golang.md)

## Open Source

1. [Project](docs/open-source/OpenSource.md)
1. [PHP](docs/languages/PHP.md#open-source)

## Environment

1. [AWS](docs/infrastructure/AWS.md)
1. [Docker](docs/infrastructure/Docker.md)

## Visual

1. [Images](docs/visual/Images.md)

## Development

You can test mkdocs by calling:

   make docs-test

This will start a development server in docker on port `8000`.
