#!/usr/bin/env bash
set -ex

[[ -f /etc/hhvm/php.ini ]] && cat /etc/hhvm/php.ini
[[ -f /etc/hhvm/config.hdf ]] && cat /etc/hhvm/config.hdf

if [[ -d /var/lib/php5 ]]; then
  ls -ld /var/lib/php5
else
  echo Default session storage directory not found.
fi

hhvm ${HHVM_FLAGS} --php vendor/phpunit/phpunit/phpunit
