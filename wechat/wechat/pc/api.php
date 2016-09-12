<?php 
	header("Content-type:text/html;charset=utf-8");
	class api_select extends menu{
		private $arr = array();
		function __construct($arr) {
			$this->arr = $arr;
		}

		public function translate($word){
			$word_code=urlencode($word);
			$api = '23PL01FYviEaPVkY7l4nN1P0';
			$url = "http://openapi.baidu.com/public/2.0/bmt/translate?client_id=".$api."&q=".$word_code."&from=auto&to=auto";
			$translateRes = $this->curl_reponse($url,'GET',null,false,false);
			$res = json_decode($translateRes,true);
			$res = $res['trans_result']; 
			$text = $res[0]['dst'];
			
			return $text;
		}
        
        public function room($num){
            switch($num){
                case 0: $str='(～﹃～)~zZ';
                    break;
                case 1: $str="人工智能基础(4-110)<1-16>\n8:00-10:45";
                    break;
                case 2: $str="就业指导(2-410)<1-8>\n8:00-9:40\n创业基础(2-203)<1-16>\n10:00-11:40\n形势与政策<7 11 15>\n14:10-16:55\n网络攻击与防范(3-809)<1-16>\n18:40-21:25";
                    break;
                case 3: $str="专业英语(4-203)<1-16>\n8:00-9:40";
                    break;
                case 4:$str="计算机图形学\n(4-205)<1-16>\n10:00-11:40\n计算机图形学\n(4-205)<双周>\n16:10-17:50";
                    break;
                case 5: $str="体育\n14:10-15:50<1-16>\n软件工程课程设计(3-804)<1-8>\n18:40-22:20";
                    break;
                case 6:$str="ε==(づ′▽`)づ";
                    break;
                default:break;
            }
            return $str;
        }
		public function getphonenum($name){
			
        	try{
        		switch($name){
                    case '少群':$num='13725486896';
                        break;
                    case '王少群':$num='13725486896';
                        break;
                    case '陈贝欣':$num='15692424425';
                        break;
                    case '贝欣':$num='15692424425';
                        break;
                    case '陈桂旋':$num='15692411316';
                        break;
                    case '陈凯东':$num='15692426797';
                        break;
                    case '陈思洁':$num='15627860699';
                        break;
                    case '陈雪霞':$num='13725471797';
                        break;
                    case '陈紫慧':$num='15692026683';
                        break;
                    case '邓夏宁':$num='18316579205';
                        break;
                    case '冯林丽':$num='13692381704';
                        break;
                    case '韩裕光':$num='15692006775';
                        break;
                    case '何绮婷':$num='13202402972';
                        break;
                    case '胡梓扬':$num='18316953164';
                        break;                                    
                    case '黄晓玫':$num='15692438218';
                        break;
                    case '黄咪':$num='15692429935';
                        break;
                    case '江浩城':$num='13725486890';
                        break;
                    case '蓝倩':$num='13265983580';
                        break;
                    case '李敏琪':$num='15692421121';
                        break;
                    case '李奕华':$num='15692428846';
                        break;
                    case '梁积培':$num='15088010480';
                        break;
                    case '梁佳宝':$num='15692438262';
                        break;
                    case '梁威灵':$num='15918453527';
                        break;
                    case '廖昭淼':$num='15975969258';
                        break;
                    case '林敏婷':$num='13202961136';
                        break;
                    case '林小萍':$num='15692028426';
                        break;                                    
                    case '刘冠馨':$num='15692029680';
                        break;
                    case '刘煜文':$num='18344402742';
                        break;
                    case '卢华洁':$num='13725486861';
                        break; 
                    case '马梓亮':$num='15692411144';
                        break;
                    case '欧阳明':$num='15626212567';
                        break;
                    case '彭碧灵':$num='18316974255';
                        break;
                    case '司徒嘉明':$num='13138632388';
                        break;
                    case '吴道弘':$num='15017355555';
                        break;
                    case '吴文桃':$num='15692431947';
                        break;
                    case '吴子鹏':$num='13728025804';
                        break;
                    case '许海深':$num='15692024539';
                        break;
                    case '许文华':$num='15692027340';
                        break;
                    case '杨俊龙':$num='15626102493';
                        break;
                    case '叶浩鹏':$num='13725486679';
                        break;                                    
                    case '叶秀':$num='13265901048';
                        break;
                    case '曾思婷':$num='15692424779';
                        break;
                    case '詹晓霞':$num='15692419001';
                        break;           
                    case '张振鹏':$num='15692015570';
                        break;
                    case '郑志先':$num='15692028708';
                        break;
                    case '卓泽耿':$num='15692028588';
                        break;
                    case '刘彩彦':$num='13726726373';
                        break;
                    case '刘锦信':$num='13247313721';
                        break;
                    case '桂旋':$num='15692411316';
                        break;
                    case '凯东':$num='15692426797';
                        break;
                    case '思洁':$num='15627860699';
                        break;
                    case '雪霞':$num='13725471797';
                        break;
                    case '紫慧':$num='15692026683';
                        break;
                    case '夏宁':$num='18316579205';
                        break;
                    case '林丽':$num='13692381704';
                        break;
                    case '裕光':$num='15692006775';
                        break;
                    case '绮婷':$num='13202402972';
                        break;
                    case '梓扬':$num='18316953164';
                        break;                                    
                    case '晓玫':$num='15692438218';
                        break;
                    case '浩城':$num='13725486890';
                        break;
                    case '敏琪':$num='15692421121';
                        break;
                    case '奕华':$num='15692428846';
                        break;
                    case '积培':$num='15088010480';
                        break;
                    case '佳宝':$num='15692438262';
                        break;
                    case '威灵':$num='15918453527';
                        break;
                    case '昭淼':$num='15975969258';
                        break;
                    case '敏婷':$num='13202961136';
                        break;
                    case '小萍':$num='15692028426';
                        break;                                    
                    case '冠馨':$num='15692029680';
                        break;
                    case '煜文':$num='18344402742';
                        break;
                    case '华洁':$num='13725486861';
                        break; 
                    case '梓亮':$num='15692411144';
                        break;
                    case '小明':$num='15626212567';
                        break;
                    case '碧灵':$num='18316974255';
                        break;
                    case '嘉明':$num='13138632388';
                        break;
                    case '道弘':$num='15017355555';
                        break;
                    case '文桃':$num='15692431947';
                        break;
                    case '子鹏':$num='13728025804';
                        break;
                    case '海深':$num='15692024539';
                        break;
                    case '文华':$num='15692027340';
                        break;
                    case '俊龙':$num='15626102493';
                        break;
                    case '浩鹏':$num='13725486679';
                        break;                                    
                    case '叶秀':$num='13265901048';
                        break;
                    case '思婷':$num='15692424779';
                        break;
                    case '晓霞':$num='15692419001';
                        break;           
                    case '振鹏':$num='15692015570';
                        break;
                    case '志先':$num='15692028708';
                        break;
                    case '泽耿':$num='15692028588';
                        break;
                    case '彩彦':$num='13726726373';
                        break;
                    case '锦信':$num='13247313721';
                        break;
                    default:$num = "Not Find ... ";
                }
                        
        	}catch(Exception $e){
        		$num = "Not Find ... ";
        	}
        	
        	return $num;
		}
		public function weather($location){
			$arr = array();
			$url = "http://api.map.baidu.com/telematics/v3/weather?location=".$location."&output=json&ak=".AK;
			$weather_json = $this->curl_reponse($url,'GET');
			$info = json_decode($weather_json,true);
			$arr['city'] = $info['results'][0]["currentCity"];
			foreach ($info['results'][0]['index'] as $key => $value) {
				$arr['do'][] = $value['des'];
			}
			foreach ($info['results'][0]["weather_data"] as $key => $value) {
				$arr['date'][] = $value['date'];
				$arr['dayPictureUrl'][] = $value['dayPictureUrl'];
				$arr['nightPictureUrl'][] = $value['nightPictureUrl'];
				$arr['weather'][] = $value['weather'];
				$arr['wind'][] = $value['weather'];
				$arr['temperature'][] = $value['weather'];
			}
			return $arr;
		}
		public function oauth(){
			$url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=".APPID."&redirect_uri=".REDIECT_URI."&response_type=code&scope=snsapi_userinfo&state=200#wechat_redirect";
			// $code = $this->curl_reponse($url,'POST');
			return $url;
		}
		public function ticket(){
			// $token = $this->get_accessToken();
			$token = $this->get_ticket();
			$url = "https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=".$token;
			$data = '
				{
					"expire_seconds":604800,"action_name":"QR_SCENE","action_info":{"scene":{"scene_id":123}}
				}
			';
			$ticket_json = $this->curl_reponse($url,'POST',$data);
			$arr = json_decode($ticket_json,true);
			$ticket = $arr['ticket'];
			$ticket_url = "https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=".$ticket;
			return $ticket_url;
		}
		public function subkey($str){
			$length = mb_strlen($str,'UTF-8') - 3;
			$str = 	mb_substr($str, 3,$length,"UTF-8");
			return $str;
		}
	}

 ?>