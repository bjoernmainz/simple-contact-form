#!/usr/bin/python

import os
import glob
import random
import shutil

globber = glob.glob("../captcha/images_orig/*.png")
file_w = open("list.txt.php", "w");

for x in range(0,5):
	random.shuffle(globber)

i = 0
filelink = {}
for g in globber:
	
	filename = "../captcha/images/%s.png" % i
	shutil.copy2(g, filename)
	g = os.path.basename(g)
	g = g.replace(".png", "")
	string = "%s|%s\n" % (i, g)
	filelink[i] = g
	print string
	file_w.write(string);
	i = i + 1
	

file_w.close();
shutil.copy2("list.txt.php", "../../config/")
os.unlink("list.txt.php")
