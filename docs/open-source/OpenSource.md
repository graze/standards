# Open Source Project Standards

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
1. The project MUST contain a CHANGELOG.md file, following the conventions laid out here:
   [keepachangelog](http://keepachangelog.com/)
1. The project SHOULD use Travis CI to automatically run unit tests on branches and PRs.
1. The project SHOULD use Docker for development, testing and execution.
