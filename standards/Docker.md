# Docker

Based on the [Docker guidelines](https://docs.docker.com/engine/userguide/eng-image/dockerfile_best-practices/)

## General

1. You SHOULD use a `.dockerignore` file - This will ensure the amount of data sent to the docker daemon will be minimal.
1. Each container SHOULD have a single concern.

## Dockerfile

1. You SHOULD sort multi-line arguments.
1. You SHOULD minimize the number of layers.
    1. Use `\` and `&&` for multiple commands:

        ```Dockerfile
        RUN cmd \
            && cmd2
        ```

    1. When adding build time packages, remove them in the same `RUN` command

        ```Dockerfile
        RUN apk add --virtual .deps \
                gcc make \
            && make \
            && ./configure \
            && apl del .deps \
            && rm -rf /path/to/installer
        ```

    1. You SHOULD use `set -xe` to print commands and stop on any errors as the first command

        ```Dockerfile
        RUN set -xe \
            && do stuff \
            && tidy
        ```

1. Multiple line `LABEL`s should use line-continuation characters to break lines

    ```Dockerfile
    LABEL maintainer="developers@graze.com" \
        license="MIT"
    ```

1. You SHOULD not use the `MAINTAINER` command (use `LABEL maintainer` instead).
1. You SHOULD not use the `LICENCE` command (use `LABEL license` instead).
1. You SHOULD use [Label Schema](label-schema.org) labels.
    1. If using, you MUST use a `org.label-schema.schema-version` field.
    1. You SHOULD include the `vendor`, `name`, `description` and `vcs-url` fields.

        ```Dockerfile
        LABEL org.label-schema.schema-version="1.0" \
            org.label-schema.vendor="graze" \
            org.label-schema.name="project-name" \
            org.label-schema.description="project description" \
            org.label-schema.vcs-url="https://github.com/graze/docker-project-name"
        ```

    1. You SHOULD generate the `vcs-ref` and `build-date` fields. Example:

        ```Dockerfile
        ARG BUILD_DATE
        ARG VCS_REF

        LABEL org.label-schema.vcs-ref=$VCS_REF \
            org.label-schema.build-date=$BUILD_DATE
        ```

        ```shell
        ~$ docker build --build-arg BUILD_DATE=$(shell date -u +"%Y-%m-%dT%H:%M:%SZ") \
              --build-arg VCS_REF=$(shell git rev-parse --short HEAD) \
              -t graze/project-name .
        ```

1. You SHOULD use `COPY` instead of `ADD` to add simple files.
1. You SHOULD define an `CMD` using the brackets notation `["executable", "param1", "param2", ...]`.
1. You SHOULD add `EXPOSE` commands for any ports that are opened.
1. You SHOULD add `VOLUME` commands for any volumes that are mutable or user-servicable.
