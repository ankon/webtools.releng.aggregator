#!/bin/bash

#Replaces @buildversionid@ by 3.8.0, in the category.xml files.
find ./ -name category.xml -type f -exec sed -i'' -e 's/@buildversionid@/3.8.0/g' {} \;
