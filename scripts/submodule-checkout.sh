#!/bin/bash

# The purpose of this script is to checkout the latest branches for all
# submodules within the current aggregator branch. It uses the
# repositories.txt file to determine the submodule to branch mappings.
#
# Usage: ./scripts/submodules-checkout.sh
#
# This script should be called from the root of the aggregator repo.

IFS=$'\n' read -d '' -r -a repos < scripts/repositories.txt

for i in "${repos[@]}"
do
    repository=$(echo $i | cut -f1 -d: | tr -d ' ')
    branch=$(echo $i | cut -f2 -d: | tr -d ' ')

    pushd $repository
    git checkout $branch
    popd
done

