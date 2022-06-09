<?php
include './goBack.php';

$dp = opendir(directory: '.');

while (($file = readdir(dir_handle: $dp)) !== false)
{
    if( fnmatch(pattern: "array*", filename: $file, flags: FNM_CASEFOLD)) { echo "파일이름: ".$file."<br/>"; }
}
closedir(dir_handle: $dp);

$list = glob(pattern: "*[Aa]m*"); // 현재 폴더에서 파일명에 Am 혹은 am이 들어가는 파일을 리스트에 담기, 상위 폴더를 검색하려면 ../ 추가 
print_r($list);