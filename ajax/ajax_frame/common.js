(function(){
    
    var $ = function(id){
        return document.getElementById(id);
    };
    $.ini = function(){
        try{return new XMLHttpRequest();}catch(e){}
        try{return new ActivXObject('Microsoft.XMLHTTP');}catch(e){}
    };
    $.get =  function(url,data,callback){
        var xhr = $.ini();
        if(url!=null){
            url+="?"+data;
        }
        xhr.open('get',url);
        xhr.onreadystatechange = function(){
            if(xhr.readyState==4&&xhr.status==200){
                callback(xhr.responseText);
            }
        };
        xhr.send(null);
    }
    $.post = function(url,data,callback,type){
        var xhr = $.ini();
        
        xhr.open('post',url);
        xhr.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhr.onreadystatechange = function(){
            if(xhr.readyState==4&&xhr.status==200){
                
                if(type==null||type=="text"){
                    callback(xhr.responseText);
                }
                if(type=="xml"){
                    callback(xhr.responseXML);
                }
                if(type=="json"){
                    
                    callback(eval('('+xhr.responseText+')'));
                }
            }
        };
        xhr.send(data);
    }
    window.$=$;
})();