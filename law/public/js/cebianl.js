// http://m.maxlaw.cn/ask/quick   http://im.maxlaw.cn/mchat.html

var imcontent=  "<div id=\"im_bian\">"+
                  "<div id=\"im_close\"> <img src=\"http://im.maxlaw.cn/duilian/m/images/close.png\" onClick=\"javascript:hide_img();\"/></div>"+
                  "<div id=\"im_bian_meinv\"><a href=\"http://m.maxlaw.cn/ask/im\" target=\"_blank\"><img src=\"http://im.maxlaw.cn/duilian/m/images/meinv.png\" /></a></div>"+
                  "<div id=\"im_bian_wz\"><a href=\"http://m.maxlaw.cn/ask/im\" target=\"_blank\"><img src=\"http://im.maxlaw.cn/duilian/m/images/flzx.gif\" /></a></div>"+
                "</div>" ;

document.write(imcontent) ;
var sjgg_dynamicLoading = {css: function(path){if(!path || path.length === 0){throw new Error('argument "path" is required !'); }var head = document.getElementsByTagName('head')[0]; var link = document.createElement('link'); link.href = path;link.rel = 'stylesheet';link.type = 'text/css';head.appendChild(link); },  js: function(path){ if(!path || path.length === 0){ throw new Error('argument "path" is required !');  } var head = document.getElementsByTagName('head')[0];  var script = document.createElement('script'); script.src = path;    script.type = 'text/javascript'; head.appendChild(script); } }
sjgg_dynamicLoading.css("http://im.maxlaw.cn/duilian/m/cebianl.css"); 
function hide_img(){document.getElementById("im_bian").style.display="none";}

function zdoOnlineIM(zvalim){
  if (zvalim=="offline"){
    var a1 = document.getElementById("im_bian_meinv");
    var a2 = document.getElementById("im_bian_wz");
    a1.innerHTML = "<a href=\"http://m.maxlaw.cn/ask/quick\" target=\"_blank\"><img src=\"http://im.maxlaw.cn/duilian/m/images/meinv.png\" /></a>";
    a2.innerHTML = "<a href=\"http://m.maxlaw.cn/ask/quick\" target=\"_blank\"><img src=\"http://im.maxlaw.cn/duilian/m/images/flzx.gif\" /></a>";
  }
}

function zim_ini(){

    sjgg_dynamicLoading.js("http://im.maxlaw.cn/getonline.asp?action1=gojs"); 

    var div_im_allheight;var div_im_allwidth; var def_im_top ;var def_im_left;
    div_im_allheight = document.body.offsetHeight || document.documentElement.clientHeight || window.innerHeight;
    div_im_allwidth  = document.body.offsetWidth || document.documentElement.clientWidth || window.innerWidth;

    var div_im_width; var div_im_height;var div_im_left;var div_im_right;var div_im_top;var div_im_bottom;
    var tmp_im_width; var tmp_im_height;var tmp_im_left;var tmp_im_right;var tmp_im_top;var tmp_im_bottom;
    
    var div_im_bian       = document.getElementById("im_bian");
    div_im_width = Math.round(div_im_allwidth * 0.2);
    div_im_bian.style.width = div_im_width + "px";
    div_im_height = div_im_width * 2 ;
    div_im_bian.style.height = div_im_height + "px";
    
    var turl = document.URL;
    if (turl.indexOf("/law")>0 || turl.indexOf("/ask")>0){
      div_im_bottom = 105 ;
    }else{
      div_im_bottom = 55 ;
    }
    
    
    div_im_right = 20 ;
    div_im_bian.style.bottom = div_im_bottom + "px";
    div_im_bian.style.right  = div_im_right + "px";
    
    
    //var div_im_blank    = document.getElementById("im_blank");
    //tmp_im_height = Math.round(tmp_im_height * 8) ;
    //im_blank.style.height = tmp_im_height + "px";
    
    //document.title = div_im_allheight +"|"+div_im_allwidth;
    //document.title += "_" + tmp_im_width + "|" + tmp_im_height ;
    //document.title += "_" + tmp_im_top + "|" + def_im_left ;
}

function sj_addLoadEvent(func){
    var oldonload=window.onload; 
    if(typeof window.onload!="function"){window.onload=func; }else{window.onload=function(){oldonload();func(); } }
} 
//sj_addLoadEvent(zim_ini);
zim_ini();
