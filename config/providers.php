<?php

declare(strict_types=1);

/* @var array $params */

use App\Common\Application\Provider\CacheProvider;
use App\Common\Application\Provider\FileRotatorProvider;
use App\Common\Application\Provider\FileTargetProvider;
use App\Common\Application\Provider\LoggerProvider;
use App\Common\Application\Provider\RouterProvider;
use App\Common\Application\Provider\SmartStreamProvider;
use Yiisoft\Arrays\Modifier\ReverseBlockMerge;

return [
    'yiisoft/router-fastroute/router' => RouterProvider::class,
    'yiisoft/cache/cache' =>  [
        '__class' => CacheProvider::class,
        '__construct()' => [
            $params['yiisoft/cache-file']['file-cache']['path'],
        ],
    ],
    'yiisoft/log-target-file/filerotator' => [
        '__class' => FileRotatorProvider::class,
        '__construct()' => [
            $params['yiisoft/log-target-file']['file-rotator']['maxfilesize'],
            $params['yiisoft/log-target-file']['file-rotator']['maxfiles'],
            $params['yiisoft/log-target-file']['file-rotator']['filemode'],
            $params['yiisoft/log-target-file']['file-rotator']['rotatebycopy']
        ],
    ],
    'yiisoft/log-target-file/filetarget' => [
        '__class' => FileTargetProvider::class,
        '__construct()' => [
            $params['yiisoft/log-target-file']['file-target']['file'],
            $params['yiisoft/log-target-file']['file-target']['levels']
        ],
    ],
    'yiisoft/log/logger' =>  LoggerProvider::class,
    'roxblnfk/smart-stream/smartstream' =>  SmartStreamProvider::class,

    ReverseBlockMerge::class => new ReverseBlockMerge()
];
