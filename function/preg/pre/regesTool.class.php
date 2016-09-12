<?php

    class regesTool{
    private $vailTool=array(
        
        'require'    =>     '/.+/'                                    ,
        'email'      =>     '/^\w+(\.\w+)*@\w+(\.\w+)+$/'             ,
        'url'        =>     '/^(https?://)?(\w+\.)+[a-zA-Z]+$/'       ,
        'currency'   =>     '/^\d+(\.\d+)?$/'                         ,
        'number'     =>     '/^\d+$/'                                 ,
        'zip'        =>     '/^\d{6}$/'                               ,
        'interger'   =>     '/^[-\+]?\d+$/'                           ,
        'double'     =>     '/^[-\+]?\d+(\.\d+)?$/'                   ,
        'english'    =>     '/^[a-zA-Z]+$/'                           ,
        'qq'         =>     '/^\d{5,11}$/'                            ,
        'mobile'     =>     '/^1(3|4|5|7|8)\d{9}$/'                   ,
    );
    private $returnMatchResult = false;
    private $fixMode = null ;
    private $matches = array();
    private $isMatch =false;
        
    }

    function __construct($returnMatchResult=false,$fixMode=null){
        $this->returnMatchResult=$returnMatchResult;
        $this->fixMode=$fixMode;
    }

    function regex($pattern , $subject){
        if(array_key_exists(strtolower($pattern),$this->vailTool)){
            $pattern = $this->vailTool[$pattern].$this->fixMode;
        }
        $this->returnMatchResult?
            preg_match_all($pattern,$subject,$this->matches):
            $this->isMatch = preg_match($pattern,$subject)===1;
        return $this->getRegexResult();
    }
    
    function getRegexResult(){
        if($this->returnMatchResult){
            return $this->matches;
        }else{
            return $this->isMatch;
        }
    }

    function toggleReturnType($bool = null){
        if(empty($bool)){
            $this->returnMatchResult = !$this->returnMatchResult;
        }else{
            $this->returnMatchResult = is_bool($bool)?$bool:(bool)$bool;
        }
    }

    function setFixMode($fixMode){
        $this->fixMode = $fixMode;
    }

    function noEmpty($str){
        return $this->regex('require',$str);
    }

    function isEmail($email){
        return $this->regex('email',$email);
    }

    function check($pattern,$subject){
        return $this->regex($pattern,$subject);
    }

?>