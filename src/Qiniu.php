<?php

namespace Hzdad\Wbsms;
use Qiniu\Auth;
use Qiniu\Sms\Sms;


class Qiniu
{
    protected $config;
    protected $status;
    protected $sms;

    public function __construct($config=[])
    {
        $this->config = $config;
        if ($this->config['AccessKey'] == null || $this->config['SecretKey'] == null) {
            $this->status = false;
        } else {
            $this->status = true;
            $auth = new Auth($this->config['AccessKey'], $this->config['SecretKey']);
            $this->sms = new Sms($auth);
        }
    }

    public function send($action,$mobile, $params)
    {
        if ($this->status) {
            $conf = $this->config['actions'][$action];
            $phoneNumbers = $mobile;
            $templateId = $conf['template_id'];
            $result = $this->sms->sendMessage($templateId, $phoneNumbers, $params);
            if (isset($result[0]['job_id'])) {
                $data['code'] = 200;
                $data['msg'] = '发送成功';
            } else {
                $data['code'] = 100;
                $data['msg'] = '发送失败';
            }
        } else {
            $data['code'] = 100;
            $data['msg'] = '请在后台设置AccessKey和SecretKey';
        }
        return $data;
    }
}