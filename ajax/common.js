function create_xhr(){
   try{
       return new XMLHttpRequest();
   } catch(e){}
   try{
       return new ActiveXObject('Microsoft.XMLHTTP');
   }catch(e){}
       
}
       
function $(id){
    return document.getElementById(id);
}