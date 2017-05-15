#! /bin/sh
# $Id: mixedgauge,v 1.7 2010/01/13 10:20:03 tom Exp $

#. ./setup-vars

#background="An Example of --mixedgauge usage"

for i in 5 10 20 30 40 50 60 70 80 90 100
do
dialog --backtitle "Mixedgauge sample" \
	--title "Mixed gauge demonstration" "$@" \
	--mixedgauge "This is a prompt message,\nand this is the second line." \
		0 0 33 \
		"Process one"	"0" \
		"Process two"	"1" \
		"Process three"	"2" \
		"Process four"	"-$i" \
		""		"8" \
		"Process five"	"5" \
		"Process six"	"-$i" \
		"Process seven"	"7" \
		"Process eight"	"-$i" \
		"Process nine"	"5"
# break
sleep 1
done
