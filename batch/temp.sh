#!/bin/bash

t=`cat /sys/bus/w1/devices/28-0114643a6aff/w1_slave | cut -f10 -d" " | grep "t="`
d=`date +"%Y-%m-%d %I:%M:%S"`
file_name=`date +"%Y%m%d"`

echo $d $t >> /home/pi/src/temperature/file/temp/$file_name
