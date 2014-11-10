#!/usr/bin/env bash
set -ex

[[ -f /etc/hhvm/php.ini ]] && cat /etc/hhvm/php.ini
[[ -f /etc/hhvm/config.hdf ]] && cat /etc/hhvm/config.hdf

hhvm ${HHVM_FLAGS} --php vendor/phpunit/phpunit/phpunit
