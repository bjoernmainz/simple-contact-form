#!/bin/bash

declare -a colors=(ffffff 009ee0 e2007a fbd8bb f9dae9 ffed00)

color=ffffff

for color in "${colors[@]}"
do
	rm -Rvf $color
	mkdir $color

	for i in `seq 2 2 100`; 
	do
		convert -background "#$color" -fill "#000000" -draw "line 1,5 10,10" -pointsize 30 label:$i $color/$i.jpg
		echo $color: $i
	done
done
