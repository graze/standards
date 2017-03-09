# Open Source Project Standards

## Common

0. The name of the project repository MUST be all lowercase and use hyphens to separate words.

0. The project MUST contain a README file.
   0. It MUST contain:
		0. A description of the project.
		0. Installation instructions.
		0. Usage instructions.
		0. License information.

0. The project MUST contain a CONTRIBUTING file.
	0. It MUST contain:
		0. How to report an issue.
		0. How to open a PR.
		0. The minimum requirements for a PR to be merged (testing etc).
		0. How to setup a development environment.
		0. How to run tests.

0. The project MUST contain a LICENSE file.

0. Source code SHOULD begin with a copyright message and link to the LICENSE file.

0. The project MUST contain a CHANGELOG file, following the conventions laid out here: http://keepachangelog.com/

0. The project SHOULD use Travis CI to automatically run unit tests on branches and PRs.

0. The project SHOULD use Docker for development, testing and execution.

## PHP

Example skeleton project: https://github.com/graze/skeleton-projects

League standards: http://thephpleague.com/#quality

Checklist: http://phppackagechecklist.com/

0. All code MUST adhere to the PSR-2 and PSR-4 standards.

0. The project MUST at least depend on the lowest supported PHP version and SHOULD depend on the latest fully supported PHP version (see https://php.net/supported-versions.php).

0. The vendor name MUST be `graze`. The vendor namespace MUST be `Graze`.

0. The project MUST contain a composer.json file.
	0. It MUST contain:
		0. The name of the project, this MUST match the name of the repository.
		0. The name of the maintainer in the `authors` section, along with the generic `Graze Developers <developers@graze.com>` author.
	0. It MUST NOT contain:
		0. The version of the project.

0. All library code MUST be in a directory named `src/`.

0. All tests MUST be a in a directory named `tests/`.

0. The project SHOULD use Scrutinizer to check and fix standards and flag code quality issues.

0. The project MUST be listed on Packagist.

