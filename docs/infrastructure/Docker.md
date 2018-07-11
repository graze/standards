# Docker

Based on the [Docker guidelines](https://docs.docker.com/engine/userguide/eng-image/dockerfile_best-practices/)

## General

1. A `.dockerignore` file SHOULD be used - This will ensure the amount of data sent to the docker daemon will be minimal.
1. Each container SHOULD have a single concern.

## Dockerfile

1. Multi-line arguments SHOULD be sorted.
1. The number of layers SHOULD be kept to a minimum.
1. A single `RUN` command can contain many commands:
    1. Use `\` and `&&` for multiple commands, with `&&` on the new line:

            RUN cmd \
                && cmd2

    1. When adding build time packages, remove them in the same `RUN` command:

            RUN apk add --virtual .deps \
                    gcc make \
                && make \
                && ./configure \
                && apl del .deps \
                && rm -rf /path/to/installer

    1. You SHOULD use `set -xe` to print commands and stop on any errors as the first command

            RUN set -xe \
                && do stuff \
                && tidy

1. Multiple line `LABEL`s should use line-continuation characters to break lines

        LABEL maintainer="developers@graze.com" \
            license="MIT"

1. The `MAINTAINER` command SHOULD NOT be used (use `LABEL maintainer` instead).
1. The `LICENSE` command SHOULD NOT be used (use `LABEL license` instead).
1. [Label Schema](http://label-schema.org/) labels SHOULD be used.
    1. If using, a `org.label-schema.schema-version` label MUST be defined.
    1. The `vendor`, `name`, `description` and `vcs-url` labels SHOULD be defined.

            LABEL org.label-schema.schema-version="1.0" \
                org.label-schema.vendor="graze" \
                org.label-schema.name="project-name" \
                org.label-schema.description="project description" \
                org.label-schema.vcs-url="https://github.com/graze/docker-project-name"

    1. The `vcs-ref` and `build-date` labels SHOULD be generated. Example:

            ARG BUILD_DATE
            ARG VCS_REF

            LABEL org.label-schema.vcs-ref=$VCS_REF \
                org.label-schema.build-date=$BUILD_DATE

        This can then be injected into the image using the `--build-arg` argument

            ~$ docker build --build-arg BUILD_DATE=`date -u +"%Y-%m-%dT%H:%M:%SZ"` \
                --build-arg VCS_REF=`git rev-parse --short HEAD` \
                -t graze/project-name .

1. `COPY` SHOULD be used instead of `ADD` for simple files.
1. `CMD` SHOULD be used with the array syntax: `["executable", "param1", "param2", ...]`.
1. All ports SHOULD be included with `EXPOSE` commands.
1. Any volumes that are mutable or user-servicable SHOULD use a `VOLUME` command.
