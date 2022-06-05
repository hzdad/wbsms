# wbsms
webman短信插件

适用于webman, 支持阿里云/腾讯云/七牛云/华为云短信, 基于 [singka-sms](https://github.com/SingKa-TECH/singka-sms) 修改

## 主要特性
* 本插件初始不安装短信发送插件,可根据需要选择安装对应云短信插件

## 安装
~~~
composer require hzdad/wbsms
~~~

## 阿里云短信安装
~~~
composer require alibabacloud/client
~~~

## 七牛云短信安装
~~~
composer require qiniu/php-sdk
~~~

## 华为云短信需要安装guzzlehttp
~~~
composer require guzzlehttp/guzzle
~~~


## 腾讯云短信
~~~
composer require qcloudsms/qcloudsms_php
~~~

腾讯云插件在php8.0时有一个bug,修复方法如下:

/vendor/qcloudsms/qcloudsms_php/src/SmsSingleSender.php:82   

原代码:
~~~
public function sendWithParam($nationCode, $phoneNumber, $templId = 0, $params,
    $sign = "", $extend = "", $ext = "")
~~~
修改后:
~~~
public function sendWithParam($nationCode, $phoneNumber, $templId = 0, $params=‘’,
    $sign = "", $extend = "", $ext = "")
~~~




## 配置
~~~
config/plugin/hzdad/wbsms/app.php
~~~

## 使用示例

~~~
    public function sendsms(){

        $action = 'register';//模板名称
        $mobile = '13588888888';//手机号
        $params = ['code' => '99999'];//参数
        $areacode = "86";//国际区号,腾讯云选传,其他不传
        $sms = new \Hzdad\Wbsms\Wbsms('qiniu');//传入短信服务商名称, 腾讯云 qcloud , 阿里云 aliyun, 七牛 qiniu, 华为 huawei
        $result = $sms->sendsms($action,$mobile,$params,$areacode);
        
        if ($result['code'] == 200) {
            echo '发送成功';
        } else {
            echo $result['msg'];
        }
    }
~~~

