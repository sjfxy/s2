<?php
/**
 * 卡券功能
 */
namespace app\api\controller;

use think\Cache;
use think\Exception;

class Coupon extends MeunBase
{

    public function create()
    {
        $token = Cache::get('token');
        $url = "https://api.weixin.qq.com/card/create?access_token=$token";
        $HttpReq = new \wx\GetAccessToken($url);
        // $time=date("Y-m-d H:i:s");
        // var_dump($time);
        // var_dump(strtotime($time));
        // var_dump(strtotime("+7 days",strtotime($time)));
        // die;
        $post = '{
    "card":{
        "card_type":"GROUPON",
        "groupon":{
            "base_info":{
                "logo_url":"http://mmbiz.qpic.cn/mmbiz/iaL1LJM1mF9aRKPZJkmG8xXhiaHqkKSVMMWeN3hLut7X7hicFNjakmxibMLGWpXrEXB33367o7zHN0CwngnQY7zb7g/0",
                "brand_name":"微信餐厅",
                "code_type":"CODE_TYPE_TEXT",
                "title":"132元双人火锅套餐",
                "color":"Color010",
                "notice":"使用时向服务员出示此券",
                "service_phone":"020-88888888",
                "description":"不可与其他优惠同享 如需团购券发票，请在消费时向商户提出 店内均可使用，仅限堂食",
                "date_info":{
                    "type":"DATE_TYPE_FIX_TIME_RANGE",
                    "begin_timestamp":1501205229,
                    "end_timestamp":1501810155
                },
                "sku":{
                    "quantity":500000
                },
                "get_limit":3,
                "use_custom_code":false,
                "bind_openid":false,
                "can_share":true,
                "can_give_friend":true,
                "location_id_list":[
                    123,
                    12321,
                    345345
                ],
                "center_title":"顶部居中按钮",
                "center_sub_title":"按钮下方的wording",
                "center_url":"www.qq.com",
                "custom_url_name":"立即使用",
                "custom_url":"http://www.qq.com",
                "custom_url_sub_title":"6个汉字tips",
                "promotion_url_name":"更多优惠",
                "promotion_url":"http://www.qq.com",
                "source":"大众点评"
            },
            "advanced_info":{
                "use_condition":{
                    "accept_category":"鞋类",
                    "reject_category":"阿迪达斯",
                    "can_use_with_other_discount":true
                },
                "abstract":{
                    "abstract":"微信餐厅推出多种新季菜品，期待您的光临",
                    "icon_url_list":[
                        "http://mmbiz.qpic.cn/mmbiz/p98FjXy8LacgHxp3sJ3vn97bGLz0ib0Sfz1bjiaoOYA027iasqSG0sj piby4vce3AtaPu6cIhBHkt6IjlkY9YnDsfw/0"
                    ]
                },
                "text_image_list":[
                    {
                        "image_url":"http://mmbiz.qpic.cn/mmbiz/p98FjXy8LacgHxp3sJ3vn97bGLz0ib0Sfz1bjiaoOYA027iasqSG0sjpiby4vce3AtaPu6cIhBHkt6IjlkY9YnDsfw/0",
                        "text":"此菜品精选食材，以独特的烹饪方法，最大程度地刺激食 客的味蕾"
                    },
                    {
                        "image_url":"http://mmbiz.qpic.cn/mmbiz/p98FjXy8LacgHxp3sJ3vn97bGLz0ib0Sfz1bjiaoOYA027iasqSG0sj piby4vce3AtaPu6cIhBHkt6IjlkY9YnDsfw/0",
                        "text":"此菜品迎合大众口味，老少皆宜，营养均衡"
                    }
                ],
                "time_limit":[
                    {
                        "type":"MONDAY",
                        "begin_hour":0,
                        "end_hour":10,
                        "begin_minute":10,
                        "end_minute":59
                    },
                    {
                        "type":"HOLIDAY"
                    }
                ],
                "business_service":[
                    "BIZ_SERVICE_FREE_WIFI",
                    "BIZ_SERVICE_WITH_PET",
                    "BIZ_SERVICE_FREE_PARK",
                    "BIZ_SERVICE_DELIVER"
                ]
            },
            "deal_detail":"以下锅底2选1（有菌王锅、麻辣锅、大骨锅、番茄锅、清补 凉锅、酸菜鱼锅可选）： 大锅1份 12元 小锅2份 16元 "
        }
    }
}';
        try {
            $data = $HttpReq->https_request($post);
            $data = json_decode($data, true);
            if ($data['errcode'] == '0' || $data['errmsg'] == 'ok') {
                return json_encode($data);
            }
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
    // 创建二维码投放
    public function qrcode()
    {
        // 领取卡券扫吗行为必须外部传递一个openid进行投放
        // 开发者可以设置扫描二维码领取单张卡券，此时POST数据为：
        $card_id = $this->create();
        $card_id = json_decode($card_id)->card_id;
        $token = Cache::get('token');
        $url = "https://api.weixin.qq.com/card/qrcode/create?access_token=$token";
        $HttpReq = new \wx\GetAccessToken($url);
        $post = '{
    "action_name":"QR_CARD",
    "expire_seconds":1800,
    "action_info":{
        "card":{
            "card_id":"' . $card_id . '",
            "code":"198374613512",
            "openid":"owXtt0zZHQlVLktmGZ0oCATfpStY",
            "is_unique_code":false,
            "outer_str":"12b"
        }
    }
}';
        try {
            $data = $HttpReq->https_request($post);
            $data = json_decode($data, true);
            if ($data['errcode'] == '0' || $data['errmsg'] == 'ok') {
                $url = $data['url'];
                $Qr = new \qr\QRcode();
                $Qr::png($url, 'qrcou.png', 8);
            }
        } catch (Exception $e) {
            print $e->getMessage();
        }
    }
    // 创建货架投放创建这些需要用的素材请需要进行批量上传临时素材和永久素材 图片 缩略图 语音视频 图文 都先页面表单上传
    
    function landingpage()
    {
        //这里的接口只是一个demo流程
        $card_id=$this->create();
        $card_id=json_decode($card_id)->card_id;
        $token=Cache::get('token');
        $url="https://api.weixin.qq.com/card/landingpage/create?access_token=$token";
        $HttpReq=new \wx\GetAccessToken($url);
    
        $post='
            {
    "banner":"http://mmbiz.qpic.cn/mmbiz_jpg/3BFfAdbXa439YRkbibEEjliaTWcL4xSicQ1DkA1xBDf5XqAWEKRBkwgvOpEmLIibpjmpSiaVYTLmQCGGfHAYkFjklQw/0",
    "page_title":"惠城优惠大派送",
    "can_share":true,
    "scene":"SCENE_NEAR_BY",
    "card_list":[
        {
            "card_id":"'.$card_id.'",
            "thumb_url":"http://mmbiz.qpic.cn/mmbiz_jpg/3BFfAdbXa439YRkbibEEjliaTWcL4xSicQ1l6fjX4hWXmYsynEkRN34ZfDe32e0knwuyvpn9bgHJpjfG5LHIicbpiaQ/0?wx_fmt=jpeg"
        },
        {
            "card_id":"'.$card_id.'",
            "thumb_url":"http://mmbiz.qpic.cn/mmbiz_jpg/3BFfAdbXa439YRkbibEEjliaTWcL4xSicQ1l6fjX4hWXmYsynEkRN34ZfDe32e0knwuyvpn9bgHJpjfG5LHIicbpiaQ/0?wx_fmt=jpeg"
        }
    ]
}';
        try {
            $data=$HttpReq->https_request($post);
            return $data;
        }catch (Exception $e)
        {
        print $e->getMessage();    
        }
    }
    public function mpnews()
    {
        //当用户关注公众号的时候 就回复当前活动的一个活动 或这卡券优惠活动的情况
        //那么使用创建卡券 选择log 投放卡券 二维码卡券 货架 卡券 
        //那么将做好的卡券进行群发 将返回的内容 html嵌入到回复的图文信息中 所有的都是群发
        //当用户关注的时候 记录用户的基本信息  取消关注删除 重复关注 更新用户信息
        //每一个月推送文章 可以如果用户注册成功 向用户发送图文消息或者其他信息 
        //当用户发起扫码 事件 根据key值不同进行相关业务逻辑处理
        //事件 
      
        $token=Cache::get('token');
        $card_id=$this->create();
        $card_id=json_decode($card_id)->card_id;
        $url="https://api.weixin.qq.com/card/mpnews/gethtml?access_token=$token";
        $HttpReq=new \wx\GetAccessToken($url);
        $post='{
    "card_id":"'.$card_id.'"
}';
        
        try
        {
           $data=$HttpReq->https_request($post);
          
           $data=json_decode($data,true);
           if($data['errcode']=='0'||$data['errmsg']=='ok')
           {
               var_dump($data);
           }
           
        }catch (Exception $e)
        {
        print $e->getMessage();    
        }
    }
}