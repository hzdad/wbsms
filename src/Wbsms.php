<?php

namespace Hzdad\Wbsms;
use Hzdad\Wbsms\Aliyun;
use Hzdad\Wbsms\Qcloud;
use Hzdad\Wbsms\Qiniu;
use Hzdad\Wbsms\Huawei;

/*
 * 文档
 * https://github.com/hzdad/wbsms
 */

class Wbsms
{
    protected $type;
    protected $config;

    public function __construct($type)
    {
        if($type == '') {
            $data['code'] = 100;
            $data['msg'] = '参数错误';
            return $data;
        } else {

            if(!in_array($type,['aliyun','qcloud','qiniu','huawei'])){
                $data['code'] = 100;
                $data['msg'] = '参数错误';
                return $data;
            }

            $config = config('plugin.hzdad.wbsms.app.'.$type);
            $this->type = $type;
            $this->config = $config;
        }
    }

    //发送短信
    /*
     * $areacode qcloud时必传
     */
    public function sendsms($action,$mobile,$params,$areacode='86'){

        if (empty($this->config['actions'][$action])) {
            $data['code'] = 100;
            $data['msg'] = '没有找到操作类型:'.$action;
            return $data;
        }

        //$areacode qcloud时必传 国际区号
        if(!$areacode){
            $areacode = "86";
        }


        switch ($this->type) {
            case 'aliyun':
                $sms = new Aliyun($this->config);
                return $sms->send($action,$mobile, $params);
                break;
            case 'qcloud':
                $sms = new Qcloud($this->config);
                $params = $this->restoreArray($params);//需将内容数组主键序号化
                return $sms->send($action, $mobile,$params,$areacode);
                break;
            case 'qiniu':
                $sms = new Qiniu($this->config);
                return $sms->send($action, $mobile,$params);
                break;
            case 'huawei':
                $sms = new Huawei($this->config);
                $params = $this->restoreArray($params);//需将内容数组主键序号化
                $params = json_encode($params);
                return $sms->send($action, $mobile,$params);
                break;
            default:
                $data['code'] = 100;
                $data['msg'] = 'type类型不存在';
                return $data;
        }

    }



    /**
     * 数组主键序号化
     *
     * @arr  需要转换的数组
     */
    public function restoreArray($arr)
    {
        if (!is_array($arr)){
            return $arr;
        }
        $c = 0;
        $new = [];
        foreach ($arr as $key => $value) {
            $new[$c] = $value;
            $c++;
        }
        return $new;
    }


}