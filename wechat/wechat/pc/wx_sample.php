<?php

header("Content-type:text/html;charset=utf-8");

$wechatObj = new wechatCallbackapiTest();
 $wechatObj->valid();
//$wechatObj->responseMsg();

class wechatCallbackapiTest extends api_select
{   
    public $fromUsername = null;
    public $toUsername = null;
    public $keyword = null;
    public $time = null;
    public $type = null;
    public $event = null;
    public $postObj = null;
    public $translate =  false;
    public $flag = 1;

	public function valid()
    {
        $echoStr = $_GET["echostr"];

        //valid signature , option
        if($this->checkSignature()){
        	echo $echoStr;
        	exit;
        }
    }

    public function responseMsg()
    {
		//get post data, May be due to the different environments
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"];

      	//extract post data
		if (!empty($postStr)){
                /* libxml_disable_entity_loader is to prevent XML eXternal Entity Injection,
                   the best way is to check the validity of xml by yourself */
                libxml_disable_entity_loader(true);
              	$this->postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
                $this->fromUsername = $this->postObj->FromUserName;
                $this->toUsername = $this->postObj->ToUserName;
                $this->type = $this->postObj->MsgType;
                $this->keyword = trim($this->postObj->Content);
                $this->time = time();
                

                $this->responseUser($this->type);
         
        }else {
        	echo "";
        	exit;
        }
    }
	
    private function responseUser($type){
        switch ($type) {
                    case 'text':
                        $this->doText();
                        break;
                    case 'image':
                        $this->doImage();
                        break;
                    case 'voice':
                        $this->doVoice();
                        break;
                    case 'video':
                        $this->doVideo();
                        break;
                    case 'shortvideo':
                        $this->doShortvideo();
                        break;
                    case 'location':
                        $this->doLocation();
                        break;
                    case 'link':
                        $this->doLink();
                        break;
                    case 'event':
                        $this->doEvent();
                    default:
                        
                        break;
                }
    }

    private function doText(){
        $textTpl = "<xml>
                        <ToUserName><![CDATA[%s]]></ToUserName>
                        <FromUserName><![CDATA[%s]]></FromUserName>
                        <CreateTime>%s</CreateTime>
                        <MsgType><![CDATA[%s]]></MsgType>
                        <Content><![CDATA[%s]]></Content>
                        <FuncFlag>0</FuncFlag>
                    </xml>";
        if(!empty( $this->keyword ))
        {
            
            /*if($this->translate&&$this->type!='event'){
                $contentStr = "translate";
                $this->translate = false;
            }*/
            if(mb_substr($this->keyword, 0,2,"UTF-8")=="翻译"){
                $str = $this->subkey($this->keyword);
                $arr = array();
//                $arr =translate($str,'en','zh');
                // $this->keyword = mb_substr($this->keyword, 3,$length,"UTF-8");
//                $this->keyword = $arr['trans_result'][0]['dst'];
                $this->keyword = $str;
                $this->flag = 0;
            }
            if($this->keyword == "1"){
                $this->keyword = "中英双翻译：—|以下格式输入\neg:\n翻译：中国\n翻译：China";
                $this->flag = 0;
            }
            if(mb_substr($this->keyword, 0,2,"UTF-8")=="天气"){
                $arr = $this->weather($this->subkey($this->keyword));
                // $this->keyword = $arr['city'];
                $this->keyword = $this->weatherResponse($arr);
                $this->flag = 0;
                exit;
            }
            if($this->keyword == "2"){
                $this->keyword = "查询天气：—|以下格式输入\neg:\n天气：北京";
                $this->flag = 0;
            }
            if(mb_substr($this->keyword, 0,2,"UTF-8")=="电话"){
                
                $this->keyword = $this->subkey($this->keyword);
                $this->keyword = $this->getphonenum($this->keyword);
                $this->flag = 0;
                // $this->keyword = 'abs';
            }
            if($this->keyword =="3"){
                $this->keyword = "通讯录：—|以下格式输入\neg:\n电话：李狗蛋\n";
                $this->flag = 0;
            }
            if($this->keyword == "erweima"){
                $this->keyword = $this->ticket();
                $this->erweima($this->keyword);
                $this->flag = 0;
            }
            if($this->keyword =="4"){
                $this->keyword = "课室查询：—|以下格式输入\neg:\n课室";
                $this->flag = 0;
            }
            if(mb_substr($this->keyword, 0,2,"UTF-8")=="课室"){
                $wee = date('w',time());
                
                $this->keyword = $this->room($wee);
                $this->flag = 0;
            }
            if($this->keyword == "?"||$this->keyword == "？"){
                $this->keyword = "welcome to wechat\n提供的服务：\n(1)翻译\n(2)天气查询\n(3)通讯录查询\n(4)课室查询\n(?)返回菜单";
            }
            if($this->flag){
                 $this->keyword = "welcome to wechat\n提供的服务：\n(1)翻译\n(2)天气查询\n(3)通讯录查询\n(4)课室查询\n(?)返回菜单";
            }
            $this->type = "text";
            $contentStr = $this->keyword;
            
            
            $resultStr = sprintf($textTpl, $this->fromUsername, $this->toUsername, $this->time, $this->type, $contentStr);
            echo $resultStr;
        }else{
            echo "Input something...";
        }
    }
    private function doMusic($arr){

        
        $music = "no find...";
        $musicTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[music]]></MsgType>
                <Music>
                <Title><![CDATA[%s]]></Title>
                <Description><![%s]]></Description>
                <MusicUrl><![CDATA[%s]]></MusicUrl>
                <HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
                </Music>
                <FuncFlag>0</FuncFlag>
            </xml>";
        if(is_array($arr)){

            // $resultStr = sprintf($textTpl, $this->fromUsername, $this->toUsername, $this->time, $this->type, $arr['tittle'],$arr['description'],$arr['MusicUrl'],$arr['HQMusicUrl']);
            $resultStr = sprintf($musicTpl, $this->fromUsername, $this->toUsername, $this->time, $arr['tittle'],$arr['description'],$arr['MusicUrl'],$arr['HQMusicUrl']);
            // echo $resultStr;
            // $resultStr = $this->fromUsername.'<br>'.$this->toUsername.'<br>'.$this->time.'<br>'.$arr['tittle'].'<br>'.$arr['description'].'<br>'.$arr['MusicUrl'].'<br>'.$arr['HQMusicUrl'];
            $this->keyword = $resultStr;
            $this->doText();
            
            
        }else{
            $this->keyword = $music;
            $this->doText();
        }
        
    }
    private function weatherResponse($arr){
        $weatherTpl="
            <xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[news]]></MsgType>
                <ArticleCount>4</ArticleCount>
                <Articles>
                <item>
                <Title><![CDATA[%s]]></Title> 
                <Description><![CDATA[0]]></Description>
                <PicUrl><![CDATA[%s]]></PicUrl>
                <Url><![CDATA[%s]]></Url>
                </item>
                <item>
                <Title><![CDATA[%s]]></Title>
                <Description><![CDATA[1]]></Description>
                <PicUrl><![CDATA[%s]]></PicUrl>
                <Url><![CDATA[%s]]></Url>
                </item>
                <item>
                <Title><![CDATA[%s]]></Title>
                <Description><![CDATA[2]]></Description>
                <PicUrl><![CDATA[%s]]></PicUrl>
                <Url><![CDATA[%s]]></Url>
                </item>
                <item>
                <Title><![CDATA[%s]]></Title>
                <Description><![CDATA[3]]></Description>
                <PicUrl><![CDATA[%s]]></PicUrl>
                <Url><![CDATA[%s]]></Url>
                </item>
                </Articles>
            </xml> 
        ";
        // return $arr['city']."+".$arr['do'][0]."+".null."+".null."+".$arr['date'][0]."+".$arr['weather'][0]."+".$arr['dayPictureUrl'][0]."+".$arr['nightPictureUrl'][0]."+".$arr['date'][1]."+".$arr['weather'][1]."+".$arr['dayPictureUrl'][1]."+".$arr['nightPictureUrl'][1]."+".$arr['date'][2]."+".$arr['weather'][2]."+".$arr['dayPictureUrl'][2]."+".$arr['nightPictureUrl'][2]."+".$arr['date'][3]."+".$arr['weather'][3]."+".$arr['dayPictureUrl'][3]."+".$arr['nightPictureUrl'][3];
        $resultStr = sprintf($weatherTpl, $this->fromUsername, $this->toUsername, $this->time, $arr['city'],$arr['dayPictureUrl'][0],$arr['nightPictureUrl'][0],$arr['date'][0]."+".$arr['weather'][0],$arr['dayPictureUrl'][0],$arr['nightPictureUrl'][0],$arr['date'][1]."+".$arr['weather'][1],$arr['dayPictureUrl'][1],$arr['nightPictureUrl'][1],$arr['date'][2]."+".$arr['weather'][2],$arr['dayPictureUrl'][2],$arr['nightPictureUrl'][2],$arr['date'][3]."+".$arr['weather'][3],$arr['dayPictureUrl'][3],$arr['nightPictureUrl'][3]);
        echo $resultStr;

    }
    private function erweima($url){
        $ticketTpl = "
           <xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[news]]></MsgType>
                <ArticleCount>1</ArticleCount>
                <Articles>
                <item>
                <Title><![CDATA[Ticket]]></Title> 
                <Description><![CDATA[公众号二维码]]></Description>
                <PicUrl><![CDATA[%s]]></PicUrl>
                <Url><![CDATA[%s]]></Url>
                </item>
                </Articles>
            </xml>     
        ";
        $resultStr = sprintf($ticketTpl, $this->fromUsername, $this->toUsername, $this->time, $url ,$url);
        echo $resultStr;
    }
    private function doNews(){
        $code = $this->oauth();
        return $code;
    }
    private function doEvent(){
        $contentStr = null;
        $this->event = $this->postObj->Event;
        switch ($this->event) {
            case 'subscribe':
                $contentStr="welcome to 计算机科学与技术2班\n提供的服务：\n(1)翻译\n(2)天气查询\n(3)通讯录查询\n(4)网页授权\n(?)返回菜单";
                break;
            case 'unsubscribe':
                break;
            case 'CLICK':
                switch ($this->postObj->EventKey) {
                    case 'TEST_PHONE':
                        $contentStr = "通讯录：—|以下格式输入\neg:\n电话：李狗蛋\n";
                        break;
                    case 'TEST_TRANS':
                        $contentStr = "中英双翻译：—|以下格式输入\neg:\n翻译：中国\n翻译：China";
                        $this->translate = true;
                        break;
                    case 'TEST_WEATHER':
                        $contentStr = "查询天气：—|以下格式输入\neg:\n天气：北京";
                        break;
                    case 'TEST_MENU':
                        $contentStr = "?";
                        break;
                    case 'TEST_HELLO':
                        // $contentStr = "Hello,Love You";
                        $contentStr = "Love You";
                        $code = $this->doNews();
                        $contentStr = '<a href="'.$code.'">点击这里绑定</a>';
                        break;
                    case 'TEST_WORLD':
                        $contentStr = "erweima";

                        break;
                    default:
                        $contentStr = "there have a error ";
                        break;
                }break;
            default:
                $contentStr = "error:receive a new event: ".$this->postObj->Event;
                break;
        }
        $this->keyword = $contentStr;
        $this->doText();
    }
	private function checkSignature()
	{
        // you must define TOKEN by yourself
        if (!defined("TOKEN")) {
            throw new Exception('TOKEN is not defined!');
        }
        
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        		
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
        // use SORT_STRING rule
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			return true;
		}else{
			return false;
		}
	}
}

?>