#!/bin/bash
# 定时自动删除备份

#catalog=`pwd`
#echo $catalog

# 创建今天的文件夹
#today=`date +%Y%m%d%H%M%S`
#mkdir $today

## 文件数量不超过20个
#count=`ls -l | grep "^d" | wc -l`
#echo $count
#length=${#count}
#count=${count:6:length}
#echo "数量:$count"
#if [ $count -ge 20 ]
#then
#	echo "数量($count)已超过限制,正在删除..."
#fi

## 文件容量不超过20GB
# volume=`cd /data/ && du -sh`
#volume=`du -sh`
#echo $volume
#volume_length=${#volume}
#volume=${volume:0:volume_length-5}
#echo "容量:$volume,长度:$volume_length"
#if [ $volume -ge 70 ]
#then
#	echo "容量($volume)已超过限制,正在删除..."
#fi

## 删除第一个目录
cd /Users/jian/Project/shell/
catalog=`date +%Y%m%d%H%M`
mkdir $catalog
first=`ls -1 | sed -n '1p;1q'`
#rm -rf $first
now=`date +%Y-%m-%d\ %H:%M:%S`
echo $now" Delete Backup Catalog "$first",假的"


#ls
