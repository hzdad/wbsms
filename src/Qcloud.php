<?php

namespace Hzdad\Wbsms;

/*
 *
在php8版本下:
腾讯云官方短信插件bug修改如下:

/vendor/qcloudsms/qcloudsms_php/src/SmsSingleSender.php:82

原:
public function sendWithParam($nationCode, $phoneNumber, $templId = 0, $params,
    $sign = "", $extend = "", $ext = "")

改为:
public function sendWithParam($nationCode, $phoneNumber, $templId = 0, $params=‘’,
    $sign = "", $extend = "", $ext = "")

 */

use Qcloud\Sms\SmsSingleSender;

class Qcloud
{
    protected $config;
    protected $status;
    protected $sms;

    public function __construct($config=[])
    {
        $this->config = $config;
        if ($this->config['appid'] == null || $this->config['appkey'] == null) {
            $this->status = false;
        } else {
            $this->status = true;
            $this->sms = new SmsSingleSender($this->config['appid'], $this->config['appkey']);
        }
    }

    public function send($action,$mobile, $params,$areacode)
    {
        if ($this->status) {
            $sms = new SmsSingleSender($this->config['appid'], $this->config['appkey']);
            $conf = $this->config['actions'][$action];
            $phoneNumbers = $mobile;
            $templateId = $conf['template_id'];
            $smsSign = $this->config['sign_name'];
            $result = $sms->sendWithParam($areacode, $phoneNumbers, $templateId, $params, $smsSign, "", "");
            $result = json_decode($result,true);
            if ($result['result'] == 0) {
                $data['code'] = 200;
                $data['msg'] = '发送成功';
            } else {
                $data['code'] = $result['result'];
                $data['msg'] = '发送失败，'.$result['errmsg'];
            }
        } else {
            $data['code'] = 100;
            $data['msg'] = '请在后台设置appid和appkey';
        }
        return $data;
    }
}