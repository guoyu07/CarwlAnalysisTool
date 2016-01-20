<?php
    /*
     * 爬虫程序
     * Say
     * 2016-01-20
     */

    define('ROOT', dirname(__FILE__).DIRECTORY_SEPARATOR);
    require ROOT.'init.php';
    
    $key = '语文';//抓取的分词
    $list = crawlCls::search($key);
    foreach($list as $id => $type){
        switch($type){//根据类型分析内容
            case 'doc':
                $data = crawlCls::doc($id);
                var_dump($data);
                crawlCls::save($data);
                break 2;
            case 'pdf':
                crawlCls::pdf($id);
//                break;
            case 'ppt':
                crawlCls::ppt($id);
//                break;
            case 'txt':
                crawlCls::txt($id);
//                break;
            default:
                crawlCls::log('type', $type.'的文件不可解析');
        } 
    }

