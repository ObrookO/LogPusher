## 日志推送包
### 一、说明
　此扩展包是为了收集项目中的日志，目前支持redis驱动。需要其他驱动可自行扩展。

### 二、使用方法
　1.安装依赖包  
    
    composer require obrooko/log-pusher　　

　2.发布资源  

    php artisan vendor:publish --tag=log_pusher
    
　3.配置  

　资源发布后，会在config文件夹下生成 `logpusher.php` 文件，请根据实际情况配置。

　4.使用  

    LogPusher\Facades\Pusher::push(1);
