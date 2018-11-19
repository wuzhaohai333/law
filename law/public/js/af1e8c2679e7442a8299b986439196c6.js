var Common=function(){return{init:function(){$("body").on('click',"#go-top",function(){$(".body").scrollTop(0);})
$(".body").scroll(function(){if($(".body").scrollTop()>100){if($("#go-top").length>0)return false;var goTopBtn=$('<span id="go-top" style="cursor:pointer;z-index: 999;display: block;"></span>');$("body").append(goTopBtn);goTopBtn.show(3000);}else{$("#go-top").remove();}})},top_menu_1:function(){var _menuLock=false;$(".lib-menu,#header-menu-wrap .common-prompt-shadow").click(function(){if(_menuLock)return;if(!$("#header-menu-wrap").hasClass("active-blcok")){$(".body").addClass("overflow-hide");$("#header-menu-wrap").removeClass("fadeOut").addClass("active-blcok fadeIn");$("#header-menu-wrap .navigation-main").removeClass("slideOutUp").addClass("active-blcok animated slideInDown");return;}
_menuLock=true;$("#header-menu-wrap").removeClass("fadeIn").addClass("fadeOut");$("#header-menu-wrap .navigation-main").removeClass("slideInDown").addClass("slideOutUp");setTimeout(function(){_menuLock=false;$(".body").removeClass("overflow-hide");$("#header-menu-wrap .navigation-main").removeClass("active-blcok");$("#header-menu-wrap").removeClass("active-blcok");},400)})},top_menu_2:function(){var _menuLock=false;$(".header-menu,#header-menu-wrap .common-prompt-shadow").click(function(){if(_menuLock)return;if(!$("#header-menu-wrap").hasClass("active-blcok")){$(".body").addClass("overflow-hide");$("#header-menu-wrap").removeClass("fadeOut").addClass("active-blcok fadeIn");$("#header-menu-wrap .navigation-main").removeClass("slideOutUp").addClass("active-blcok animated slideInDown");return;}
_menuLock=true;$("#header-menu-wrap").removeClass("fadeIn").addClass("fadeOut");$("#header-menu-wrap .navigation-main").removeClass("slideInDown").addClass("slideOutUp");setTimeout(function(){_menuLock=false;$(".body").removeClass("overflow-hide");$("#header-menu-wrap .navigation-main").removeClass("active-blcok");$("#header-menu-wrap").removeClass("active-blcok");},400)})},top_menu_3:function(){function toggleMeun(){$('.body').toggleClass('overflow-hide');$('#j-meun').toggleClass('close-icon');$('#j-nav-navigation').toggleClass('fadeIn active-blcok');if($('#j-nav-navigation').find('.nav-navigation-inner').hasClass('slideInDown')){$('#j-nav-navigation').find('.nav-navigation-inner').removeClass('slideInDown').addClass('slideOutUp');}else{$('#j-nav-navigation').find('.nav-navigation-inner').removeClass('slideOutUp').addClass('slideInDown');}}
$('#j-meun').on('click',function(){toggleMeun();})
$('#j-nav-navigation').on('click',function(){toggleMeun();})},footer_menu_1:function(){$("#MoreBtn").on("click",function(){$(this).toggleClass("active");$(".tab_item").toggleClass('active');});},footer_menu_2:function(uid,name,phone,mobile,pageSource){var _div=$('#content-prompt'),small='',HTML='';_div.find('#onlineConsult').click(function(){if(tj_findlawyer_params&&tj_findlawyer_params.EventConsult){tj_findlawyer_params.PageName='找律师在线咨询';tj_findlawyer_params.Event='list';tj_findlawyer_params.Bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult;if(tjPageJson){tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'",'+tjPageJson+'}';}else{tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'"}';}
Common.tj_findlawyer(tj_findlawyer_params);}
return true;});_div.find('#telConsult').click(function(){if(tj_findlawyer_params&&tj_findlawyer_params.EventConsult){tj_findlawyer_params.PageName='找律师电话咨询';tj_findlawyer_params.Event='list';tj_findlawyer_params.Bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult;if(tjPageJson){tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'",'+tjPageJson+'}';}else{tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'"}';}
Common.tj_findlawyer(tj_findlawyer_params);}
return true;});},footer_menu_3:function(uid,name,phone,mobile,pageSource){var _div=$('#content-prompt'),small='',HTML='';if(mobile){small='small-footer-lawyer-item';}
HTML+='<div class="footer-lawyer-item gray-item" id="lawyerInfo">'
+'    <a href="http://m.findlaw.cn/lawyer/'+uid+'/" class="footer-lawyer-link">'
+'        <span class="footer-lawyer-photo"><img src="'+phone+'" alt="'+name+'"></span>'
+'        <span class="footer-lawyer-name">'+name+'</span>'
+'    </a>'
+'</div>';HTML+='<div class="footer-lawyer-item blue-item '+small+'">'
+'    <a href="https://m.findlaw.cn/ask/ask.php?uid='+uid+'" class="footer-lawyer-link" id="onlineConsult">'
+'        <img src="//img3.findlawimg.com/img/touch_front/v3/global/icon-info.png?ver=1497498548" alt="" class="fl-item-icon">'
+'        <span class="fl-item-text">在线咨询</span>'
+'    </a>'
+'</div>';if(mobile){HTML+='<div class="footer-lawyer-item orange-item '+small+'">'
+'    <a href="tel:'+mobile+'" class="footer-lawyer-link" id="telConsult">'
+'        <img src="//img1.findlawimg.com/img/touch_front/v3/global/icon-tel.png?ver=1497498548" alt="" class="fl-item-icon">'
+'        <span class="fl-item-text">电话咨询</span>'
+'    </a>'
+'</div>';}
_div.find('.footer-lawyer').html(HTML);_div.removeClass('lib-vanish');if(window.__adSwiper){window.__adSwiper.stopAutoplay();}
_div.find('.prompt-shadow').click(function(){_div.addClass('lib-vanish');if(window.__adSwiper){window.__adSwiper.startAutoplay();}});var tjPageJson='';if(tj_findlawyer_params.PageJson){tjPageJson=tj_findlawyer_params.PageJson.substring(1);tjPageJson=tjPageJson.substring(0,tjPageJson.length-1);}
if(tj_findlawyer_params&&tj_findlawyer_params.EventConsult){tj_findlawyer_params.PageName='找律师咨询我';tj_findlawyer_params.Event='list';tj_findlawyer_params.Bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult;if(tjPageJson){tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'",'+tjPageJson+'}';}else{tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'"}';}
Common.tj_findlawyer(tj_findlawyer_params);}
_div.find('#onlineConsult').click(function(){if(tj_findlawyer_params&&tj_findlawyer_params.EventConsult){tj_findlawyer_params.PageName='找律师在线咨询';tj_findlawyer_params.Event='list';tj_findlawyer_params.Bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult;if(tjPageJson){tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'",'+tjPageJson+'}';}else{tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'"}';}
Common.tj_findlawyer(tj_findlawyer_params);}
return true;});_div.find('#telConsult').click(function(){if(tj_findlawyer_params&&tj_findlawyer_params.EventConsult){tj_findlawyer_params.PageName='找律师电话咨询';tj_findlawyer_params.Event='list';tj_findlawyer_params.Bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult;if(tjPageJson){tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'",'+tjPageJson+'}';}else{tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'"}';}
Common.tj_findlawyer(tj_findlawyer_params);}
return true;});_div.find('#lawyerInfo').click(function(){if(tj_findlawyer_params&&tj_findlawyer_params.EventConsult){tj_findlawyer_params.PageName='找律师律师主页';tj_findlawyer_params.Event='list';tj_findlawyer_params.Bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult;if(tjPageJson){tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'",'+tjPageJson+'}';}else{tj_findlawyer_params.PageJson='{"uid":"'+uid+'","username":"'+name+'","mobile":"'+mobile+'","phone":"'+phone+'"}';}
Common.tj_findlawyer(tj_findlawyer_params);}
return true;});},footer_menu_4:function(uid,name,phone,mobile,pageSource,qid,PageType,clickTag){var _div=$('#content-prompt'),small='',HTML='';if(mobile){small='small-footer-lawyer-item';}
HTML+='<div class="footer-lawyer-item gray-item" id="lawyerInfo">'
+'    <a href="http://m.findlaw.cn/lawyer/'+uid+'/" class="footer-lawyer-link">'
+'        <span class="footer-lawyer-photo"><img src="'+phone+'" alt="'+name+'"></span>'
+'        <span class="footer-lawyer-name">'+name+'</span>'
+'    </a>'
+'</div>';HTML+='<div class="footer-lawyer-item blue-item '+small+'">'
+'    <a href="https://m.findlaw.cn/ask/ask.php?uid='+uid+'" class="footer-lawyer-link" id="onlineConsult">'
+'        <img src="//img3.findlawimg.com/img/touch_front/v3/global/icon-info.png?ver=1497498548" alt="" class="fl-item-icon">'
+'        <span class="fl-item-text">在线咨询</span>'
+'    </a>'
+'</div>';if(mobile){HTML+='<div class="footer-lawyer-item orange-item '+small+'">'
+'    <a href="tel:'+mobile+'" class="footer-lawyer-link" id="telConsult">'
+'        <img src="//img1.findlawimg.com/img/touch_front/v3/global/icon-tel.png?ver=1497498548" alt="" class="fl-item-icon">'
+'        <span class="fl-item-text">电话咨询</span>'
+'    </a>'
+'</div>';}
_div.find('.footer-lawyer').html(HTML);_div.removeClass('lib-vanish');if(window.__adSwiper){window.__adSwiper.stopAutoplay();}
_div.find('.prompt-shadow').click(function(){_div.addClass('lib-vanish');if(window.__adSwiper){window.__adSwiper.startAutoplay();}});if(tj_findlawyer_params){var bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult,userType=0;switch(bottom){case'quesDetailReply':userType=0;break;case'quesDetailReply1':userType=1;break;case'quesDetail':userType=2;break;}
tj_findlawyer_params.uid=uid;tj_findlawyer_params.qid=qid;tj_findlawyer_params.PageType=PageType;tj_findlawyer_params.clickTag=clickTag;tj_findlawyer_params.userType=userType;Common.tj_findlawyer1(tj_findlawyer_params);}
_div.find('#onlineConsult').click(function(){if(tj_findlawyer_params){var bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult,userType=0;switch(bottom){case'quesDetailReply':userType=0;break;case'quesDetailReply1':userType=1;break;case'quesDetail':userType=2;break;}
tj_findlawyer_params.uid=uid;tj_findlawyer_params.qid=qid;tj_findlawyer_params.PageType=PageType;tj_findlawyer_params.clickTag='在线咨询';tj_findlawyer_params.userType=userType;Common.tj_findlawyer1(tj_findlawyer_params);}
return true;});_div.find('#telConsult').click(function(){if(tj_findlawyer_params){var bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult,userType=0;switch(bottom){case'quesDetailReply':userType=0;break;case'quesDetailReply1':userType=1;break;case'quesDetail':userType=2;break;}
tj_findlawyer_params.uid=uid;tj_findlawyer_params.qid=qid;tj_findlawyer_params.PageType=PageType;tj_findlawyer_params.clickTag='电话咨询';tj_findlawyer_params.userType=userType;Common.tj_findlawyer1(tj_findlawyer_params);}
return true;});_div.find('#lawyerInfo').click(function(){if(tj_findlawyer_params){var bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult,userType=0;switch(bottom){case'quesDetailReply':userType=0;break;case'quesDetailReply1':userType=1;break;case'quesDetail':userType=2;break;}
tj_findlawyer_params.uid=uid;tj_findlawyer_params.qid=qid;tj_findlawyer_params.PageType=PageType;tj_findlawyer_params.clickTag='律师主页';tj_findlawyer_params.userType=userType;Common.tj_findlawyer1(tj_findlawyer_params);}
return true;});},tj_findlawyer:function(pm){var data={'PageName':pm['PageName'],'PageURL':pm['PageURL'],'PageURLup':pm['PageURLup'],'PageType':3,'PageJson':pm['PageJson'],'Event':pm['Event'],'Bottom':pm['Bottom'],'Qid':0,};$.ajax({type:"post",url:"//m.findlaw.cn/index.php?c=ajax&a=countAsk",dataType:"json",data:data,success:function(data){}});},tj_findlawyer1:function(pm){var data={'uid':pm['uid'],'qid':pm['qid'],'PageType':pm['PageType'],'clickTag':pm['clickTag'],'presentUrl':pm['PageURL'],'sourceUrl':pm['PageURLup'],'userType':pm['userType'],};$.ajax({type:"post",url:"//m.findlaw.cn/index.php?c=ajax&a=countAsk1",dataType:"json",data:data,async:false,success:function(data){}});},footer_menu_6:function(uid,name,phone,mobile,pageSource,qid,PageType,clickTag){var _div=$('#content-prompt'),small='',HTML='';if(mobile){small='small-footer-lawyer-item';}
if(!(uid==67&&mobile.substr(0,3)=='400')){if(mobile){HTML+='<div class="footer-lawyer-item blue-item '+small+'">'
+'    <a href="tel:'+mobile+'" class="footer-lawyer-link" id="telConsult"  onclick="_hmt.push([\'_trackEvent\', \'咨询内容页\', \'底部引导浮框\', \'电话咨询\'])">'
+'        <img src="//img1.findlawimg.com/img/touch_front/v3/global/icon-tel.png?ver=1497498548" alt="" class="fl-item-icon">'
+'        <span class="fl-item-text">电话咨询</span>'
+'    </a>'
+'</div>';}
HTML+='<div class="footer-lawyer-item red-item '+small+'">'
+'    <a href="https://m.findlaw.cn/ask/ask.php?uid='+uid+'" class="footer-lawyer-link" id="onlineConsult"  onclick="_hmt.push([\'_trackEvent\', \'咨询内容页\', \'底部引导浮框\', \'在线咨询\'])">'
+'        <img src="//img3.findlawimg.com/img/touch_front/v3/global/icon-info.png?ver=1497498548" alt="" class="fl-item-icon">'
+'        <span class="fl-item-text">在线咨询</span>'
+'    </a>'
+'</div>';_div.find('.footer-lawyer-v2').html(HTML);_div.removeClass('lib-vanish');if(window.__adSwiper){window.__adSwiper.stopAutoplay();}
_div.find('.prompt-shadow').click(function(){_div.addClass('lib-vanish');if(window.__adSwiper){window.__adSwiper.startAutoplay();}});}
if(tj_findlawyer_params){var bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult,userType=0;switch(bottom){case'quesDetailReply':userType=0;break;case'quesDetailReply1':userType=1;break;case'quesDetail':userType=2;break;}
tj_findlawyer_params.uid=uid;tj_findlawyer_params.qid=qid;tj_findlawyer_params.PageType=PageType;tj_findlawyer_params.clickTag=clickTag;tj_findlawyer_params.userType=userType;Common.tj_findlawyer1(tj_findlawyer_params);}
_div.find('#onlineConsult').click(function(){if(tj_findlawyer_params){var bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult,userType=0;switch(bottom){case'quesDetailReply':userType=0;break;case'quesDetailReply1':userType=1;break;case'quesDetail':userType=2;break;}
tj_findlawyer_params.uid=uid;tj_findlawyer_params.qid=qid;tj_findlawyer_params.PageType=PageType;tj_findlawyer_params.clickTag='在线咨询';tj_findlawyer_params.userType=userType;Common.tj_findlawyer1(tj_findlawyer_params);}
return true;});_div.find('#telConsult').click(function(){if(tj_findlawyer_params){var bottom=pageSource?pageSource:tj_findlawyer_params.EventConsult,userType=0;switch(bottom){case'quesDetailReply':userType=0;break;case'quesDetailReply1':userType=1;break;case'quesDetail':userType=2;break;}
tj_findlawyer_params.uid=uid;tj_findlawyer_params.qid=qid;tj_findlawyer_params.PageType=PageType;tj_findlawyer_params.clickTag='电话咨询';tj_findlawyer_params.userType=userType;Common.tj_findlawyer1(tj_findlawyer_params);}
return true;});},tj_findlawyer:function(pm){var data={'PageName':pm['PageName'],'PageURL':pm['PageURL'],'PageURLup':pm['PageURLup'],'PageType':3,'PageJson':pm['PageJson'],'Event':pm['Event'],'Bottom':pm['Bottom'],'Qid':0,};$.ajax({type:"post",url:"//m.findlaw.cn/index.php?c=ajax&a=countAsk",dataType:"json",data:data,success:function(data){}});},tj_findlawyer1:function(pm){var data={'uid':pm['uid'],'qid':pm['qid'],'PageType':pm['PageType'],'clickTag':pm['clickTag'],'presentUrl':pm['PageURL'],'sourceUrl':pm['PageURLup'],'userType':pm['userType'],};$.ajax({type:"post",url:"//m.findlaw.cn/index.php?c=ajax&a=countAsk1",dataType:"json",data:data,async:false,success:function(data){}});},tabTap:function(pm){var _parent=pm.parent,_tab=pm.tab,_active=pm.active,_content=pm.content;var _toolsClass=pm.tool?pm.tool:' ';_parent.find(_tab).click(function(){var index=$(this).index();$(this).addClass(_active).siblings().removeClass(_active);_parent.find(_content).removeClass(_active+' '+_toolsClass).eq(index).addClass(_active+' '+_toolsClass);})},}}();;var Study=function(){return{init:function(){$(".text-detail").click(function(){var parent=$(this).parents(".learnlaw-profile-text");var ellipsis=parent.find('.learnlaw-profile-text-ellipsis');var hidden=parent.find('.learnlaw-profile-text-hidden');if(parent.hasClass("auto-height")){$(this).text("展开↓");ellipsis.show();hidden.hide();}else{$(this).text("收起↑");ellipsis.hide();hidden.show();}
parent.toggleClass("auto-height");});$(".show-more").click(function(){if($(this).html()=='了解更多'){return true;}
$(this).parent().find(".classify-block-list.absolute-height").toggleClass("auto-height");$(this).hasClass("__show")?$(this).text("展开↓"):$(this).text("收起↑");$(this).toggleClass("__show");});this.getLayerList();},searchLawer:function(prof_id,areacode){if(prof_id!=0){$.ajax({type:"post",url:"http://m.findlaw.cn/?m=Home&c=Study&a=ajaxProfUrlSearch",data:{classId:prof_id,cityId:areacode},dataType:"json",cache:false,async:false,success:function(response){if(response.state==1){window.location.href=response.data;return true;}else{window.location.href='http://m.findlaw.cn/findlawyers';return false;}}});}else{window.location.href='http://m.findlaw.cn/findlawyers';return false;}},getLayerList:function(){$.ajax({type:'GET',url:'http://m.findlaw.cn/?m=Home&c=Study&a=ajaxGetLawyerList',data:{pinyin:citypy,askqtid:askqtid},dataType:"json",success:function(ret){if(ret.state==1){var data=ret.data;var html='<div class="common-findlawyer-h3-area">'
+'<h3 class="title-text large-text">找法网特别推荐</h3>'
+'</div>'
+'<div class="swiper-container" id="team-recommend">'
+' <div class="swiper-wrapper">';$.each(data,function(n,law){if(law.username!=null){var name='律师';html+='<div class="swiper-slide">'
+' <div class="common-team-info">'
+'  <a href="http://m.findlaw.cn/lawyer/'+law.uid+'" class="info-photo" onclick="Study.tj_findlawyer1('+law.uid+',\'律师主页\')"><img src="'+law.photo+'" alt="'+law.username+''+name+'"></a>'
+'  <a href="http://m.findlaw.cn/lawyer/'+law.uid+'" class="info-photo" onclick="Study.tj_findlawyer1('+law.uid+',\'律师主页\')"><p class="info-title">'+law.username+''+name+'</p></a>'
+'  <p class="team-labels">'
+'<span class="label-item"></span>'
+'  </p>'
+'  <a href="javascript:void(0);" class="team-consult" onclick="Common.footer_menu_4('+law.uid+',\''+law.username+name+'\',\''+law.photo+'\','+law.mobile+',\'quesDetail\',0,\'m站学习法律\',\'咨询我\')">咨询我</a>'
+' </div>'
+'</div>';}});html+='</div>'
+'<div class="team-pagination"></div>'
+'</div>';$('#wlt-team-list').html(html);}},});},tj_findlawyer1:function(uid,clickTag){params1.uid=uid;params1.clickTag=clickTag;if(!params1.PageURL||!params1.uid||!params1.clickTag){return false;}
Common.tj_findlawyer1(params1);}}}();