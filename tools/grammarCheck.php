<?php
date_default_timezone_set("PRC");
//路径文件名
$files = array();
//引用文件
$imports = array();
//常量定义
$constants = array();
//分隔符
$separator = DIRECTORY_SEPARATOR;
//1：读取文件（boolean） 2：项目
$readFile = !empty($argv[1]) ? $argv[1] : 0;
$readProject = !empty($argv[2]) ? explode('#', $argv[2]) : array();
// $num = $argc;

$constants['root'] = __DIR__ . $separator;
//项目映射关系
$constants['projects'] = array(
    'm' => array('model', 'controller'),
    's' => array('model', 'controller')
);
//路径
if(!empty($readFile)) {
    $fileRoute = $constants['root'] . $readFile;
    $files = combinationRouteByFile($fileRoute, $constants['root']);
} else {
    $files = [];
    if(empty($readProject)) {
        $files[] = combinationRouteByArr($constants['projects'], $constants['root']);
    } else {
        $data = array();
        foreach($readProject as $key => $index) {
            if(!isset($constants['projects'][$index])) continue;
            $data[$index] =  $constants['projects'][$index];
        }
        $files = combinationRouteByArr($data, $constants['root']);
    }
}

gammarCheck($files);

function combinationRouteByArr($projects, $root)
{
    foreach($projects as $key => $val) {
        foreach($val as $dir) {
            $dirName = $root . $key . DIRECTORY_SEPARATOR . $dir;
            $iterator = new FileSystemIterator($dirName);
            foreach($iterator as $file) {
                yield $dirName . DIRECTORY_SEPARATOR . $file->getFileName();
            }
        }
    }
}

function combinationRouteByFile($fileRoute, $root)
{
    $file = new SplFileInfo($fileRoute);
    $fileObj = $file->openFile("r");
    $files = array();
    while($fileObj->valid()){
        $files[] = $root . $fileObj->fgets();
    }
    $fileObj = null;
    $file = null;
    return $files;
}

function gammarCheck($files)
{
    foreach($files as $fileName) {
        $command = 'php -f ' . $fileName;
        $res = shell_exec($command);
        echo $command . PHP_EOL . $res . PHP_EOL;
    }
}