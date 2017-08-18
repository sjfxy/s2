<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
//\think\Loader::addNamespace("my","../application/extend/my/");
//手动加载
/**
 * \think\Loader::addNamespace([
2.    'my'  => '../application/extend/my/',
3.    'org' => '../application/extend/org/',
4.]);
 */
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
