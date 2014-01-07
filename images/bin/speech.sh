#!/bin/bash

folder=../captcha/speech

lang=de
echo $folder
sleep 1

rm -Rvf $folder/$lang

mkdir -p $folder/$lang

for i in `seq 2 2 100`; 
do 
	espeak -v mb/mb-de5 -w $folder/$lang/$i.wav "Rechenaufgabe: Teile die folgende Zahl durch zwei: $i"
	lame -V 5 $folder/$lang/$i.wav $folder/$lang/$i.mp3
	oggenc -q 3 -o $folder/$lang/$i.ogg $folder/$lang/$i.wav
	echo $i; 
done

#for i in `seq 100 100 1200`; 
#do 
#	espeak -v mb/mb-de5 -w $folder/$lang/$i.wav "Rechenaufgabe: Teile die folgende Zahl durch zwei: $i"
#	lame -V 5 $folder/$lang/$i.wav $folder/$lang/$i.mp3
#	oggenc -q 3 -o $folder/$lang/$i.ogg $folder/$lang/$i.wav
#	echo $i; 
#done

rm $folder/$lang/*.wav

lang=en

rm -Rvf $folder/$lang
mkdir -p $folder/$lang

for i in `seq 2 2 100`; 
do 
	espeak -w $folder/$lang/$i.wav "Arithmetic Problem. Divide the following number by 2: $i"
	lame -V 5 $folder/$lang/$i.wav $folder/$lang/$i.mp3
	oggenc -q 3 -o $folder/$lang/$i.ogg $folder/$lang/$i.wav
	echo $i; 
done

#for i in `seq 100 100 1200`; 
#do 
#	espeak -v mb/mb-de5 -w $folder/$lang/$i.wav "Rechenaufgabe: Teile die folgende Zahl durch zwei: $i"
#	lame -V 5 $folder/$lang/$i.wav $folder/$lang/$i.mp3
#	oggenc -q 3 -o $folder/$lang/$i.ogg $folder/$lang/$i.wav
#	echo $i; 
#done

rm $folder/$lang/*.wav

exit 0

