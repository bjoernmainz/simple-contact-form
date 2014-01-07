#!/usr/bin/python

import os
import glob
import shutil


def rename(files):
	new_files = []
	for f in files:
		dirname = os.path.dirname(f)
		basename = os.path.basename(f)
		filetype = ""
		number = ""
		print("------------")	
		print("Basename: %s") %  basename 
		if not basename.find("ogg") == -1:
			file_type = "ogg";
			number = basename.replace(".ogg", "")
		elif not basename.find("mp3") == -1:
			file_type = "mp3";
			number = basename.replace(".mp3", "")
		else:
			raise("Not found")
	
		print "Number: %s" % number
		new_number = blist[number]
		new_filename = "%s/%s_new.%s" % (dirname, blist[number], file_type)
		print("%s -> %s") % (f, new_filename)
		shutil.move(f, new_filename)
		new_files.append(new_filename)
		
		#print blist
		



fileh = open("../../config/list.txt.php")

blist = {}

for f in fileh:
	f = f.rstrip()
	f = f.split("|")
	f[1] = f[1].rstrip()
	blist[f[1]] = f[0]

globber = glob.glob("../captcha/speech/de/*.ogg")
rename(globber)
globber = glob.glob("../captcha/speech/de/*.mp3")
rename(globber)
globber = glob.glob("../captcha/speech/en/*.ogg")
rename(globber)
globber = glob.glob("../captcha/speech/en/*.mp3")
rename(globber)
