#!/bin/bash

#Replaces @buildversionid@ by 3.7.0, in the category.xml files.
find ./ -name category.xml -type f -exec sed -i 's/@buildversionid@/3.7.0/g' {} \;
