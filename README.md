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

## 各大云商短信价格比较,仅供参考(2022年06月05日19:54:31)

云商|1000条|5万条|20万条|是否支持国际短信
:-|:-|:-|-:|:-:
阿里云|50  |2150 | 7980 | 支持  
腾讯云|50  |2350 | 8400 | 支持  
七牛(618活动价)|23.65(原价43)  |1501.56(原价2085.2) | 6127.5(原价8170) | 支持  
华为(618活动价)|65  |1800(原价3150) | 7000(原价12000) | 支持  



阿里云 https://common-buy.aliyun.com/?spm=5176.8195934.J_5834642020.3.75eb437807Tgj1&&commodityCode=newdysmsbag#/buy

腾讯云 https://buy.cloud.tencent.com/sms

华为 https://www.huaweicloud.com/product/msgsms.html

七牛 https://qmall.qiniu.com/template/MjI?spec_combo=MTA0OA&smsprice-txt=

##如果选购短信
* 尽量不要购买小厂的短信, 到达率没保证, 而且价格偏高
* 购买套餐包,套餐包比按量付费更优惠
* 购买前在云商首页查看是否有优惠活动
* 不考虑价格的情况下, 阿里云腾讯云无疑是最省心的
* 七牛性价比较高
* 不怕麻烦的情况下,也可以多个云商通道混搭使用



