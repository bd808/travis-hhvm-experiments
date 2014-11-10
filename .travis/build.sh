#!/usr/bin/env bash
set -ex

hhvm ${HHVM_FLAGS} --php vendor/phpunit/phpunit/phpunit
