#!/bin/bash

read -p "Commit message: " message

if [ $message -z ]
then
	echo "Commit message unknow. Aborting..."
else
	git add *
	git commit -a -m "$message"
	#git push --repo=https://everton3x:Eegaer6x@github.com/everton3x/clip7.git
	git push
fi
