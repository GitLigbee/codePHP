<?php 


	$menu = new menu();
	$menu->get_menu();


	class menu {
		public $access_token = null;

		public function __construct() {
			;
		}

		public function get_menu(){
			$this->get_acessToken();
			// echo $this->access_token;
			// echo '</br>';
			$this->create_menu();

			
		}
		public function get_ticket(){
			// return $this->access_token;
			return $this->get_acessToken();
		}
		public function create_menu(){
			$url = 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token='.$this->access_token;
			$menu = '
				{
					"button":[
						{	
							"name":"server",
							"sub_button":[
								{
									"type":"click",
									"name":"translate",
									"key":"TEST_TRANS"
								},
								{
									"type":"click",
									"name":"weather",
									"key":"TEST_WEATHER"
								},
								{
									"type":"click",
									"name":"phone",
									"key":"TEST_PHONE"
								}
							]
							
						},
						{
							"type":"click",
							"name":"menu",
							"key":"TEST_MENU"
						},
						{
							"name":"authorize",
							"sub_button":[
								{
									"type":"click",
									"name":"hello",
									"key":"TEST_HELLO"
								},
								{
									"type":"click",
									"name":"world",
									"key":"TEST_WORLD"
								}
							]
														
						}
					]
				}
			';
			$this->curl_reponse($url,'POST',$menu,false);
		}

		public function get_acessToken(){
			$url = 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.APPID.'&secret='.APPSECRET;
			// $url = 'https://www.baidu.com';
			return $this->curl_reponse($url,'POST',null,true);
			
		}

		public function curl_reponse($url,$method='GET',$data=null,$access=false,$https=true){
			
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			if($https){
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE); 
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
			}
			if($method=='POST'){

				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			}
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$content = curl_exec($ch);
			curl_close($ch);
			
			if($access){
				$json = json_decode($content,true);
				$this->access_token = $json['access_token'];
				$content = $this->access_token;
			}
			// var_dump($json);
			return $content;
		}
	}
 ?>