#!/bin/bash

./run.php test/and/test1.es
./run.php test/and/test2.es
read -p "Press enter to continue"
clear

./run.php test/or/test1.es
./run.php test/or/test2.es
./run.php test/or/test3.es
./run.php test/or/test4.es
read -p "Press enter to continue"
clear

./run.php test/xor/test1.es
./run.php test/xor/test2.es
./run.php test/xor/test3.es
./run.php test/xor/test4.es
read -p "Press enter to continue"
clear

./run.php test/negation/test1.es
./run.php test/negation/test2.es
./run.php test/negation/test3.es
./run.php test/negation/test4.es
read -p "Press enter to continue"
clear

./run.php test/multiple/test1.es
./run.php test/multiple/test2.es
./run.php test/multiple/test3.es
./run.php test/multiple/test4.es
read -p "Press enter to continue"
clear
echo "The end";
