#!/bin/bash

# clean up "dirt" from previous build
git submodule foreach git clean -f -d -x
git submodule foreach git reset --hard HEAD
git clean -f -d -x
git reset --hard HEAD
