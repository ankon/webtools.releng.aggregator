#!/bin/bash

#Replaces @buildversionid@ by 3.6.1, in the category.xml files.
find ./ -name category.xml -type f -exec sed -i 's/@buildversionid@/3.6.1/g' {} \;
