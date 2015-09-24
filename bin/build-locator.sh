#!/bin/bash
####
# @author stev leibelt <artodeto@bazzline.net>
# @since 2015-09-24
####

# moving to project root
SCRIPT_PATH=$(cd $(dirname "$0"); pwd)
cd "$SCRIPT_PATH/../"

# building autoload
./vendor/bin/net_bazzline_generate_locator configuration/locator.php

exit 0
