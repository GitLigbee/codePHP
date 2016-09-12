<?php
upload($_FILES['file']);
function upload($file){
    if($file['error']!=0){
        return false;
    }
    //3M
    $max_size = 3145728;
    if($max_size<$file['size']){
        return false;
    }
    //设置一个后缀名与mime的映射关系
    $type_map = array(
        '.jpeg'=>array('image/jpeg','image/pjpeg'),
        '.jpg'=>array('image/jpeg','image/pjpeg'),
        '.png'=>array('image/png','image/x-png'),
        '.gif'=>array('image/gif')
    );
    //后缀
    $allow_ext_list = array('.jpeg','.png','.jpg');
    $ext = strtolower(strrchr($file['name'],'.'));
    if(!in_array($ext,$allow_ext_list)){
        echo '不支持该图片格式';
        return false;
    }
    //MIME
    $allow_mime_list = array();
    foreach($allow_ext_list as $val){
        $allow_mime_list = array_merge($allow_mime_list,$type_map[$val]);
    }
    //浏览器提供信息坚持
    $allow_mime_list = array_unique($allow_mime_list);
    if(!in_array($file['type'],$allow_mime_list)){
        echo '不支持该图片格式';
        return false;
    }
    //php自身检查
    $file_mime = new Finfo(FILEINFO_MIME_TYPE);
    $mime = $file_mime->file($file['tmp_name']);
    if(!in_array($mime,$allow_mime_list)){
        echo '不支持该图片格式';
        return false;
    }
    //目录存储
    $up_loadpath = './';
    $sub_dir = date('Ymdh');
    if(!is_dir($up_loadpath.$sub_dir)){
        mkdir($up_loadpath.$sub_dir);
    }
    $prefix = 'bee_';
    $name = uniqid($prefix,true).$ext;
    if(move_uploaded_file($file['tmp_name'],$up_loadpath.$sub_dir.$name)){
        echo '上传成功';
        return $name;
    }else{
        echo '上传失败';
        return false;
    }
}