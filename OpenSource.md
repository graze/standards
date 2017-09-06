# Open Source Project Standards

## Common

1. The name of the project repository MUST be all lowercase and use hyphens to separate words.
1. The project MUST contain a README.md file.
    1. It MUST contain:
        1. A description of the project.
        1. Installation instructions.
        1. Usage instructions.
        1. License information.
    1. It SHOULD contain:
        1. Badge to show current build status.
    1. It COULD contain:
        1. Badges to show other relevant project statuses such as project version, code coverage, etc.
1. The project MUST contain a CONTRIBUTING.md file.
    1. It MUST contain:
        1. How to report an issue.
        1. How to open a PR.
        1. The minimum requirements for a PR to be merged (testing etc).
        1. How to setup a development environment.
        1. How to run tests.
1. The project MUST contain a LICENSE.md file.
1. Source code SHOULD begin with a copyright message and link to the LICENSE file.
1. The project MUST contain a CHANGELOG.md file, following the conventions laid out here: http://keepachangelog.com/
1. The project SHOULD use Travis CI to automatically run unit tests on branches and PRs.
1. The project SHOULD use Docker for development, testing and execution.

## PHP

Example skeleton project: https://github.com/graze/skeleton-projects

League standards: http://thephpleague.com/#quality

Checklist: http://phppackagechecklist.com/

1. All code MUST adhere to the [PSR-2](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md) and [PSR-4](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md) standards.
1. The project MUST at least depend on the lowest supported PHP version and SHOULD depend on the latest fully supported PHP version (see https://php.net/supported-versions.php).
1. The vendor name MUST be `graze`. The vendor namespace MUST be `Graze`.
1. The project MUST contain a composer.json file.
    1. It MUST contain:
        1. The name of the project, this MUST match the name of the repository.
        1. The name of the maintainer in the `authors` section, along with the generic `Graze Developers <developers@graze.com>` author.
    1. It MUST NOT contain:
        1. The version of the project.
1. All library code MUST be in a directory named `src/`.
1. All tests MUST be a in a directory named `tests/`.
1. The project SHOULD use Scrutinizer to check and fix standards and flag code quality issues.
1. The project MUST be listed on Packagist.

## Golang

1. All code MUST be automatically formatted using `gofmt`.
1. All code SHOULD pass the checks carried out by `go lint`.

## Python

1. All code SHOULD conform to the [PEP 8](https://www.python.org/dev/peps/pep-0008/) and [PEP 257](https://www.python.org/dev/peps/pep-0257/) guides
