x12=function(){conf={version:'0.9.9.5',probeRoot:document,hkey:'5r$X35#d1%2',ckey:'s63tFt@1',scookie_name:'x12',rowdm:'$$',coldm:'||',fprdm:'@@',fpcdm:'##',svcdm:'++',svrdm:'--',scd:'%%',cexitdat:[32,33,35,36,38,39,40,41,42,43,44],cinitdat:[8,11,15,16,22,23,24,25,26,29,30,31,32,33,34,36,37,43],blocalStorage:false,b_clearStorageonInit:false,mxqss:2048,mxcks:4096,mxlss:5120000,mxwns:5000,loopTimObs:1500,sPXLendpoint:'https://'+document.location.host+'/qsl/trans.gif',sXHRendpoint:'https://'+document.location.host+'/qsl/trans.gif',sCNFendpoint:'https://'+document.location.host+'/ext/conf',analyzerURL:'https://'+document.location.host+'/qsl/x12eva.html',excludeIDs:['analyzerpanel','stack-ov'],b_testmode:false,targetDList:'bankieren.rabobank.nl',targetPList:'bankieren.rabobank.nl%20/klanten/%20s',ScreenMapping:[['',1],['',2]],TRXDomInf:[['accountNumber'],['amount'],['name'],['description','paymentFeature.paymentFeature1']],pop_perc_go:'333',dataconf:{},STATE_NAME:'state',RUNTIME_NAME:'runtime',KEYSTROKE_NAME:'keystroke',DOMCHANGE_NAME:'domchange',FORMCHANGE_NAME:'formchange',const_na:'nav',brtck1:'XPRDRAB1',brtck2:'XPRDRAB2',sessid:'te256dw2',custid:'35623323',pageguid:'',confStringError:'',fbConfString:'MC45OC0wMC0wMC0xNS0zMzMtLS0tLS05OS05OS0wMDAwMDAwMDAwMDAwMDAwfDEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS0xMDAxLTEwMDEtMTAwMS1RN3wzMDcxNDQ2OTE=',parseConfString:function(cstr){cobj={};cq7=OLB.length;sglobtot=Util.Base64.decode(cstr);aglobtot=sglobtot.split('|');if(aglobtot.length>1){schksm=aglobtot[2];rchksm=Util.createCRC32(aglobtot[0]+'|'+aglobtot[1]);if(schksm!=rchksm){conf.confStringError='ceics';return false}cobj.checksum=schksm;vglob=aglobtot[0];amsgt=aglobtot[1].split('Q7');vmsg=amsgt[0];vscr=Util.Base64.decode(amsgt[1]);aglob=vglob.split('-');amsg=vmsg.split('-');ascr=vscr.split(',');cobj.screens=ascr;vrs=aglob[0];tmt=aglob[3];pop=aglob[4];dsc1=aglob[5];dsc2=aglob[6];dsc3=aglob[7];dsc4=aglob[8];dsc5=aglob[9];cobj.meta={'version':vrs,'timed':tmt,'procpop':pop,'domscanscope':[dsc1,dsc2,dsc3,dsc4,dsc5]};conf.pop_perc_go=pop;msgarr=[];for(t=0;t<cq7;t++){qenum=t-1+2;scmsg=amsg[t];slen=scmsg.length;bfld1=scmsg.substr(0,1);vfld2=scmsg.substr(1,slen-3);vfld3=scmsg.substr(slen-2,2);msgobj={'msgid':t+1,'active':bfld1,'length':vfld2,'encode':vfld3};msgarr.push(msgobj)}cobj.message=msgarr;conf.confStringError='none';return cobj}conf.confStringError='navcs';return false}},Observer={ui_lastActive:0,observerLoop:function(){cfp=Collector.createFootprint();azfp=Collector.zfp.split(';');acfp=cfp.split(';');for(t=0;t<Collector.zfp.length;t++){if(azfp[t]!=acfp[t]){lsobj='observer.alert';lstat=azfp[t]+'::'+acfp[t].split('=')[1];ltype='na';lpagex='na';lpagey='na';ltelm='na';sDat=Storage.createLogRule(lsobj,ltype,lpagex,lpagey,ltelm,lstat);Storage.storeData(sDat);Collector.zfp=cfp}}},setProbes:function(){Util.addProbe(conf.probeRoot,'click',function(e){Collector.collectEvents('window.click',null,e)});Util.addProbe(conf.probeRoot,'focus',function(e){Collector.collectEvents('window.focus',null,e)});Util.addProbe(conf.probeRoot,'blur',function(e){Collector.collectEvents('window.blur',null,e)});Util.addProbe(conf.probeRoot,'focusin',function(e){Collector.collectEvents('window.focus',null,e)});Util.addProbe(conf.probeRoot,'focusout',function(e){Collector.collectEvents('window.blur',null,e)});Util.addProbe(conf.probeRoot,'error',function(msg,url,ln){Collector.collectEvents('window.error',ln+'-'+url+'-'+msg,null)});Util.addProbe(conf.probeRoot,'DOMAttrModified',function(e){Collector.collectEvents('dom.modified',null,e)});Util.addProbe(conf.probeRoot,'keypress',function(e){Observer.updateUIState('UI.keypress',null,e)});Util.addProbe(conf.probeRoot,'mousemove',function(e){Observer.updateUIState('UI.mousemove',null,e)});Util.addProbe(conf.probeRoot,'paste',function(e){Collector.collectEvents('UI.paste',null,e)});},handleWatch:function(pr,ov,nv){},updateUIState:function(sobj,qq,e){this.ui_lastActive=new Date().getTime();if(sobj=='UI.keypress'){Recorder.doRecTextInput(e);}if(sobj=='UI.mousemove'){Recorder.doRecMousemove(e);}}},Collector={zfp:'',collectFootprintData:function(aObj){for(t=0;t<OLB.length;t++){sref=OLB[t][1];if(sref.indexOf('||')!=-1){alor=sref.split('||');sobj=undefined;for(l=0;l<alor.length;l++){aref=alor[l].split('.');tobj=window;for(s=0;s<aref.length;s++){tobj=tobj[aref[s]]?tobj[aref[s]]:conf.const_na}sobj=sobj||tobj}}else{aref=sref.split('.');sobj=window;for(s=0;s<aref.length;s++){if(s==aref.length-1&&OLB[t][2]=='()'){sobj=sobj[aref[s]]?sobj[aref[s]]():conf.const_na}else{sobj=sobj[aref[s]]?sobj[aref[s]]:conf.const_na}}if(OLB[t][2]!==''&&OLB[t][2]!=='()'){sobj=sobj[OLB[t][2]]?sobj[OLB[t][2]]:conf.const_na}}aObj.push([OLB[t][0]+conf.fpcdm+sobj])}},checkExObjects:function(objid){if(objid){sobj=conf.excludeIDs.join(',');if(sobj.indexOf(objid)!=-1){return true}else{return false}}},collectEvents:function(sobj,prms,e){e=!e?window.event:e;lgroup='nn';ltype='nn';levent='nn';ldata='undefined';if(e){ltype=e.type;xypos=Util.getCurrentXYPos(e);lmousex=xypos[0];lmousey=xypos[1];oTarget=Util.getTargetNode(e);sDOMChain=Util.calculateDomChain(oTarget);lpagex=Util.calculateScreenPos(oTarget)[0];lpagey=Util.calculateScreenPos(oTarget)[1];if(this.checkExObjects(oTarget.id)){return false}scrstate=Util.getScreenState();imgstate=Util.getImageState();frmstate=Util.serializeForms();ltelm=Util.createDomSelector(oTarget)}lsobj=sobj;lstat='unchanged';switch(sobj){case'window.error':lstat=prms;sDat=Storage.createQ7LogRule(lgroup,ltype,levent,ldata);Storage.storeData(sDat);break;case'dom.modified':lgroup='runtime';ltype='dommod';levent='change';if('attrChange'in e){switch(e.attrChange){case MutationEvent.MODIFICATION:muttype='mod';fromAttrb=e.attrName;fromValue=e.prevValue;toValue=e.newValue;break;case MutationEvent.ADDITION:muttype='add';fromAttrb=e.attrName;fromValue='nn';toValue=e.newValue;break;case MutationEvent.REMOVAL:muttype='del';fromAttrb=e.attrName;fromValue=e.prevValue;toValue='nn';break}}if('propertyName'in e){muttype='mod';fromAttrb=e.propertyName;fromValue='nn';toValue='nn'}ldata='';ldata+='s_dompos'+conf.fpcdm+sDOMChain+conf.fprdm;ldata+='e_ltelm'+conf.fpcdm+ltelm+conf.fprdm;ldata+='s_muttype'+conf.fpcdm+muttype+conf.fprdm;ldata+='s_fromAttrb'+conf.fpcdm+fromAttrb+conf.fprdm;ldata+='s_fromValue'+conf.fpcdm+fromValue+conf.fprdm;ldata+='s_toValue'+conf.fpcdm+toValue+conf.fprdm;ldata+='c_lpagex'+conf.fpcdm+lpagex+conf.fprdm;ldata+='c_lpagey'+conf.fpcdm+lpagey+conf.fprdm;ldata+='s_lstat'+conf.fpcdm+lstat+conf.fprdm;ldata+='s_scrstate'+conf.fpcdm+scrstate.join('')+conf.fprdm;ldata+='s_imgstate'+conf.fpcdm+imgstate.join('')+conf.fprdm;ldata+='s_frmstate'+conf.fpcdm+frmstate+conf.fprdm;sDat=Storage.createQ7LogRule(lgroup,ltype,levent,ldata);Storage.storeData(sDat);break;case'window.focus':if(oTagName.toLowerCase()=='input'&&sType.toLowerCase()=='text'&&(ltype=='focus'||ltype=='focusin')){lstat=Recorder.mm_buff.join('|');lastmpos=Recorder.mm_buff[Recorder.mm_buff.length-1];lgroup='runtime';ltype='formmod';levent='touched';ldata='e_touchedobjname'+conf.fpcdm+Util.getDomPos(oTarget.id)+conf.fprdm;ldata+='c_touchedobjpos'+conf.fpcdm+'('+lastmpos+')'+conf.fprdm;ldata+='v_touchedobjval'+conf.fpcdm+oTarget.value;Recorder.startRecTextInput();Recorder.stopRecMousemove();sDat=Storage.createQ7LogRule(lgroup,ltype,levent,ldata);Storage.storeData(sDat)}break;case'window.blur':if(oTagName.toLowerCase()=='input'&&sType.toLowerCase()=='text'&&(ltype=='blur'||ltype=='focusout')){lgroup='runtime';ltype='formmod';levent='changed';lastmpos=Recorder.mm_buff[Recorder.mm_buff.length-1];ldata='';ldata+='v_changedobjname'+conf.fpcdm+Util.getDomPos(oTarget.id)+conf.fprdm;ldata+='c_changedobjpos'+conf.fpcdm+'('+lastmpos+')'+conf.fprdm;ldata+='v_changedobjvalue'+conf.fpcdm+Recorder.kb_buff+'::'+oTarget.value;Recorder.stopRecTextInput();Recorder.startRecMousemove();sDat=Storage.createQ7LogRule(lgroup,ltype,levent,ldata);Storage.storeData(sDat)}break;case'UI.paste':lstat=oTarget.value;sDat=Storage.createQ7LogRule(lgroup,ltype,levent,ldata);Storage.storeData(sDat);break;default:}},getInitData:function(){aifd=[];sDat=Storage.createLogRule('Page.init.1','na','na','na','na',sifm);Storage.storeData(sDat);for(t=0;t<ifmb.length;t++){aifm[t]=ifmb[t][0]+conf.fpcdm+ifmb[t][1];sifm=aifm.join(conf.fprdm)}},getQ7InitData:function(){aifd=[];ldata='';Storage.state.screenname=Collector.util.getScreenName();Storage.state.screennameslist.push(Storage.state.screenname);Storage.state.timestampclient=Collector.util.getClientsideTimestamp();Storage.state.sessionstarttime=Collector.util.getClientsideTimestamp();Storage.state.location=document.location.href;Storage.state.lang=navigator.language||navigator.userLanguage;Storage.state.localtime=Storage.state.timestampclient.toLocaleString();Collector.collectFootprintData(aifd);ldata=aifd.join(conf.fprdm);sDat=Storage.createQ7LogRule(conf.STATE_NAME,'load','start',ldata);Storage.storeData(sDat)},getQ7ExitData:function(){bifd=[];ldata='';Storage.state.prevstayed=Collector.util.getTimeStayed();Collector.collectFootprintData(bifd);ldata=bifd.join(conf.fprdm);sDat=Storage.createQ7LogRule(conf.STATE_NAME,'unload','exit',ldata);Storage.storeData(sDat)},createFootprint:function(){sfp='';fpm=[['n_anchors',document.anchors.length],['n_applets',document.applets.length],['n_embeds',document.embeds.length],['n_forms',document.forms.length],['n_images',document.images.length],['n_links',document.links.length],['n_css',document.styleSheets.length],['n_frames',window.frames.length],['s_status',window.status],['n_headnodes',document.getElementsByTagName('head')[0].childNodes.length],['n_bodynodes',document.body.childNodes.length],['b_ajaxobj',window.XMLHttpRequest.length],['z_location',location]];for(t=0;t<fpm.length;t++){sfp+=fpm[t][0]+conf.fpcdm+fpm[t][1]+conf.fprdm}return sfp},util:{getScreenName:function(){uriObj=location.href;rv=Util.getNamedvalueFromString(uriObj,'X015');return rv},getScreenHash:function(){scrhash=Util.getScreenState();for(item in scrhash){scrhash[item]=Util.convertTo61(scrhash[item])}return scrhash.join('')},getTimeStampServer:function(){sck=Storage.getCookie(conf.brtck2);ttim=typeof sck!='undefined'?sck.split('|')[2].substring(32):'nn';return ttim},getDiffNameLocation:function(){cloc=document.location;csnm=Collector.util.getScreenName();csnm=csnm!=null?csnm:'';sloc=Storage.state.getStartLocationFromState();ssnm=Storage.state.getScreenNameFromState();ssnm=ssnm!=null?ssnm:'';aout=[];for(s=0;s<cloc.length;s++){if(cloc.substr(s,1)!=sloc.substr(s,1)){aout.push(cloc.substr(s,1))}}for(s=0;s<csnm.length;s++){if(csnm.substr(s,1)!=ssnm.substr(s,1)){aout.push(csnm.substr(s,1))}}return aout.join('')},countDocumentDomElements:function(){return document.getElementsByTagName('*').length},getHiddenDomElms:function(){},getClientsideTimestamp:function(){dobj=new Date();return dobj},getStartTimeFromBritCookie:function(){sck=Storage.getCookie(conf.brtck1);ttim=typeof sck!='undefined'?sck.split('|')[2]:'nn';return ttim},getScopedDomStructure:function(){},createTagListFingerPrint:function(){ncss=document.styleSheets.length;nbutton=document.getElementsByTagName('button').length;ntxtarea=document.getElementsByTagName('textarea').length;ntable=document.getElementsByTagName('table').length;nobject=document.getElementsByTagName('object').length;ninput=document.getElementsByTagName('input').length;niframe=document.getElementsByTagName('iframe').length;napplet=document.applets.length;nplugin=navigator.plugins.length;njscript=document.scripts.length;ntot=ncss+nbutton+ntxtarea+ntable+nobject+ninput+niframe+napplet+nplugin+njscript;nall=document.getElementsByTagName('*').length;nrest=nall-ntot;tlfp=ncss;tlfp+=Util.createRNDval(2);tlfp+=nbutton;tlfp+=ntxtarea;tlfp+=ntable;tlfp+=nrest;tlfp+=nobject;tlfp+=ninput;tlfp+=Util.createRNDval(2);tlfp+=niframe;tlfp+=nobject;tlfp+=napplet;tlfp+=Util.createRNDval(2);tlfp+=nplugin;tlfp+=njscript;tlfp+=Util.createRNDval(2);return tlfp},createScreenListFingerPrint:function(){return Storage.state.screennameslist.join()},getTRXData:function(){tr=[];for(i in conf.TRXDomInf){mval='';for(r in conf.TRXDomInf[i]){o=document.getElementById(conf.TRXDomInf[i][r]);if(o!=null){mval=mval||o.value}}tr.push(mval)}return tr},jsDateFromjJD:function(jdhd){jd=jdhd/ 1000000 /3600/24;jsms=(jd-2440587.5)*86400000;d=new Date(jsms);return d},getTimeStayed:function(){t1=new Date(Storage.state.getStartTimeFromState());t2=new Date(Collector.util.getClientsideTimestamp());return Util.compressTime(t2.getTime()-t1.getTime())}}},Util={serializeArray:function(aobj,lst,scdel,srdel){rout=[];cout=[];alst=lst.split(';');for(t=0;t<aobj.length;t++){for(s=0;s<alst.length;s++){sval=alst[s].indexOf('e')!=-1?escape(aobj[t][alst[s].valueOf()]):aobj[t][alst[s].valueOf()];rout.push(sval)}cout.push(rout.join(scdel));rout=[]}return cout.join(srdel)},serializeAsoArray:function(aobj,lst,scdel,srdel,b_escape){rout=[];cout=[];alst=lst.split(';');for(t=0;t<aobj.length;t++){for(s=0;s<alst.length;s++){sval=b_escape?escape(aobj[t][alst[s]]):aobj[t][alst[s]];rout.push(sval)}cout.push(rout.join(scdel));rout=[]}return cout.join(srdel)},serializeForms:function(){d=document;sfrm='';for(f=0;f<d.forms.length;f++){sfrm+='form'+f+'{'+Util.serializeAsoArray(d.forms[f].childNodes,'name;value','=','&',false)+'}'}return sfrm},addProbe:function(obj,type,fn){if(obj.attachEvent){obj.attachEvent('on'+type,fn)}else{obj.addEventListener(type,fn,true)}},removeProbe:function(obj,type,fn){if(obj.detachEvent){obj.detachEvent('on'+type,obj[type+fn]);obj[type+fn]=null}else{obj.removeEventListener(type,fn,true)}},createDomSelector:function(oTarget){oClass=oTarget.className?'.'+oTarget.className.replace(/ /gi,'.'):'';oId=oTarget.id?'#'+oTarget.id:'';oTagName=oTarget.tagName?oTarget.tagName:'';sType=oTarget.type?oTarget.type:'';sName=oTarget.type?oTarget.name:'';oAttr=sType&&sName?'[type='+sType+';name='+sName+']':sType?'[type='+sType+']':sName?'[name='+sName+']':'';ltelm=oTarget.nodeName+oAttr+oId+oClass;return ltelm},getDomPos:function(objid){objref=document.getElementById(objid);pos='';if(objref){for(f in document.forms){for(e in document.forms[f]){if(document.forms[f][e]===objref){pos=(f*1+1)*100+e*1;break}}}}return pos},getCurrentXYPos:function(e){posx=0;posy=0;if(!e)e=window.event;if(e.pageX||e.pageY){posx=e.pageX;posy=e.pageY}else if(e.clientX||e.clientY){posx=e.clientX+document.body.scrollLeft+document.documentElement.scrollLeft;posy=e.clientY+document.body.scrollTop+document.documentElement.scrollTop}return[posx,posy]},calculateScreenPos:function(obj){var curleft=curtop=0;if(obj.offsetParent){do{curleft+=obj.offsetLeft;curtop+=obj.offsetTop}while(obj=obj.offsetParent)}return[curleft,curtop]},getMsgLengthFromModel:function(){tot=0;for(t=0;t<conf.dataconf;t++){tot+=conf.dataconf.messages[t].length-0}return tot},isInArray:function(ar,item){for(t=0;t<ar.length;t++){if(ar[t]==item){return true}}return false},getScreenState:function(){aScreenState=[];w_out_w=aScreenState.push(window.outerWidth);w_out_h=aScreenState.push(window.outerHeight);w_inn_w=aScreenState.push(window.innerWidth);w_inn_h=aScreenState.push(window.innerHeight);w_pos_x=aScreenState.push(window.screenX);w_pos_y=aScreenState.push(window.screenY);s_out_w=aScreenState.push(screen.width);s_out_h=aScreenState.push(screen.height);s_avl_w=aScreenState.push(screen.availWidth);s_avl_h=aScreenState.push(screen.availHeight);v_cln_w=aScreenState.push(document.body.clientWidth);v_cln_h=aScreenState.push(document.body.clientHeight);v_cln_x=aScreenState.push(document.body.clientLeft);v_cln_y=aScreenState.push(document.body.clientTop);v_ofs_w=aScreenState.push(document.body.offsetWidth);v_ofs_h=aScreenState.push(document.body.offsetHeight);v_ofs_x=aScreenState.push(document.body.offsetLeft);v_ofs_y=aScreenState.push(document.body.offsetTop);v_scr_w=aScreenState.push(document.body.scrollWidth);v_scr_h=aScreenState.push(document.body.scrollHeight);v_scr_x=aScreenState.push(document.body.scrollLeft);v_scr_y=aScreenState.push(document.body.scrollTop);chk_m_locbar=window.locationbar!=undefined?window.locationbar.visible-0:'na';m_locbar=aScreenState.push(chk_m_locbar);chk_m_menbar=window.menubar!=undefined?window.menubar.visible-0:'na';m_menbar=aScreenState.push(chk_m_menbar);chk_m_prsbar=window.personalbar!=undefined?window.personalbar.visible-0:'na';m_prsbar=aScreenState.push(chk_m_prsbar);chk_m_stsbar=window.statusbar!=undefined?window.statusbar.visible-0:'na';m_stsbar=aScreenState.push(chk_m_stsbar);chk_m_tolbar=window.toolbar!=undefined?window.toolbar.visible-0:'na';m_tolbar=aScreenState.push(chk_m_tolbar);chk_m_scrbar=window.scrollbars!=undefined?window.scrollbars.visible-0:'na';m_scrbar=aScreenState.push(chk_m_scrbar);return aScreenState},calculateDomChain:function(obj){aChain=[];if(obj!==window&&obj.parentNode!=null){do{treepos=0;if(obj===obj.parentNode.firstChild){treepos=1;break}if(obj===obj.parentNode.lastChild){treepos=obj.parentNode.childNodes.length;break}do{treepos++;obj=obj.previousSibling}while(obj!==obj.parentNode.firstChild);aChain.push(treepos);obj=obj.parentNode}while(obj!==document)}return aChain.join('.')},compressTime:function(stim){dctime=stim/10;if(dctime<60000){return dctime}else{return 60000+Math.ceil(dctime/100-600)}},getTargetNode:function(e){if(!e)e=window.event;targ=e.target||e.srcElement;return targ},getNamedvalueFromString:function(sObj,key){key=key.replace(/[\[]/,'\\[').replace(/[\]]/,'\\]');var regex=new RegExp('[\\?&]'+key+'=([^&#]*)');var qs=regex.exec(sObj);if(qs==null){return null}else{return qs[1]}},aFind:function(aObj,key){for(var items in aObj){if(aObj[items][0]==key){return aObj[items][1];break}}return-1},createGUID:function(){return Util.Base64.encode(new Date().getTime())},createRNDval:function(npos){rndval=Math.floor(Math.random()*(Math.pow(npos,10)*0.9)+(npos-1)*10);},getImageState:function(){aImg=[];adi=document.images;for(i=0;i<adi.length;i++){aimgfp=adi[i].src.split('/');s_imgfn=aimgfp[aimgfp.length-1];c_img_nh=adi[i].naturalHeight;c_img_nw=adi[i].naturalWidth;c_img_ch=adi[i].clientHeight;c_img_cw=adi[i].clientWidth;c_img_cxy=Util.calculateScreenPos(adi[i]);c_img_cx=c_img_cxy[0];c_img_cy=c_img_cxy[1];aimginfo=[s_imgfn,c_img_nh,c_img_nw,c_img_ch,c_img_cw,c_img_cx,c_img_cy];aImg.push(aimginfo)}return aImg},convertTo61:function(decin){rdx=61;d4=Math.floor(decin/Math.pow(rdx,4));d3=Math.floor((decin-d4*Math.pow(rdx,4))/Math.pow(rdx,3));d2=Math.floor((decin-d3*Math.pow(rdx,3))/Math.pow(rdx,2));d1=Math.floor((decin-d2*Math.pow(rdx,2))/Math.pow(rdx,1));rm=decin%rdx;s1=String.fromCharCode(d1<10?d1+48:d1<36?d1+55:d1>35&&d1<61?d1+61:121);s2=String.fromCharCode(d2<10?d2+48:d2<36?d2+55:d2>35&&d2<61?d2+61:121);s3=String.fromCharCode(d3<10?d3+48:d3<36?d3+55:d3>35&&d3<61?d3+61:121);s4=String.fromCharCode(d4<10?d4+48:d4<36?d4+55:d4>35&&d4<61?d4+61:121);sr=String.fromCharCode(rm<10?rm+48:rm<36?rm+55:rm>35&&rm<61?rm+61:121);s4=s4==0?'':s4;s3=s3==0?'':s3;s2=s2==0?'':s2;return s4+s3+s2+s1+sr},convertTo61_old:function(decin){if(decin>3720||decin<-61){return'zz'}ind=decin<0?'z':'';decin=Math.abs(decin);st='='.charCodeAt(0);r1=Math.floor(decin/st);s1=String.fromCharCode(r1<10?r1+48:r1<36?r1+55:r1>35&&r1<62?r1+61:122);r2=decin-r1*st;s2=String.fromCharCode(r2<10?r2+48:r2<36?r2+55:r2>35&&r2<62?r2+61:122);if(decin>-61&&ind=='z'){return'z'+s2}return ind+s1+s2},convertTo7:function(decin){st=7;r1=Math.floor(decin/st);r2=decin-r1*st;return r1+r2},convertTo16:function(decin){st=16;r1=Math.floor(decin/st);r2=decin-r1*st;s1=r1>9?String.fromCharCode(r1+55):r1;s2=r2>9?String.fromCharCode(r2+55):r2;return s1+s2},createCRC32:function(s){var i;var chk=305419896;for(i=0;i<s.length;i++){chk+=s.charCodeAt(i)*i}return chk},Base64:{_keyStr:'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=',_keyStr61:'0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxy',encode:function(input){var output='';var chr1,chr2,chr3,enc1,enc2,enc3,enc4;var i=0;input=this._utf8_encode(input);while(i<input.length){chr1=input.charCodeAt(i++);chr2=input.charCodeAt(i++);chr3=input.charCodeAt(i++);enc1=chr1>>2;enc2=(chr1&3)<<4|chr2>>4;enc3=(chr2&15)<<2|chr3>>6;enc4=chr3&63;if(isNaN(chr2)){enc3=enc4=64}else if(isNaN(chr3)){enc4=64}output=output+this._keyStr.charAt(enc1)+this._keyStr.charAt(enc2)+this._keyStr.charAt(enc3)+this._keyStr.charAt(enc4)}return output},b61encode:function(input){var output='';var chr1,chr2,chr3,enc1,enc2,enc3,enc4;var i=0;input=this._utf8_encode(input);while(i<input.length){chr1=input.charCodeAt(i++);chr2=input.charCodeAt(i++);chr3=input.charCodeAt(i++);enc1=chr1>>2;enc2=(chr1&3)<<4|chr2>>4;enc3=(chr2&15)<<2|chr3>>6;enc4=chr3&60;if(isNaN(chr2)){enc3=enc4=61}else if(isNaN(chr3)){enc4=61}output=output+this._keyStr61.charAt(enc1)+this._keyStr61.charAt(enc2)+this._keyStr61.charAt(enc3)+this._keyStr61.charAt(enc4)}return output},decode:function(input){var output='';var chr1,chr2,chr3;var enc1,enc2,enc3,enc4;var i=0;input=input.replace(/[^A-Za-z0-9\+\/\=]/g,'');while(i<input.length){enc1=this._keyStr.indexOf(input.charAt(i++));enc2=this._keyStr.indexOf(input.charAt(i++));enc3=this._keyStr.indexOf(input.charAt(i++));enc4=this._keyStr.indexOf(input.charAt(i++));chr1=enc1<<2|enc2>>4;chr2=(enc2&15)<<4|enc3>>2;chr3=(enc3&3)<<6|enc4;output=output+String.fromCharCode(chr1);if(enc3!=64){output=output+String.fromCharCode(chr2)}if(enc4!=64){output=output+String.fromCharCode(chr3)}}output=this._utf8_decode(output);return output},_utf8_encode:function(string){string+='';string=string.replace(/\r\n/g,'\n');var utftext='';for(var n=0;n<string.length;n++){var c=string.charCodeAt(n);if(c<128){utftext+=String.fromCharCode(c)}else if(c>127&&c<2048){utftext+=String.fromCharCode(c>>6|192);utftext+=String.fromCharCode(c&63|128)}else{utftext+=String.fromCharCode(c>>12|224);utftext+=String.fromCharCode(c>>6&63|128);utftext+=String.fromCharCode(c&63|128)}}return utftext},_utf8_decode:function(utftext){var string='';var i=0;var c=c1=c2=0;while(i<utftext.length){c=utftext.charCodeAt(i);if(c<128){string+=String.fromCharCode(c);i++}else if(c>191&&c<224){c2=utftext.charCodeAt(i+1);string+=String.fromCharCode((c&31)<<6|c2&63);i+=2}else{c2=utftext.charCodeAt(i+1);c3=utftext.charCodeAt(i+2);string+=String.fromCharCode((c&15)<<12|(c2&63)<<6|c3&63);i+=3}}return string}}},Controler={cxmlhttp:{},cxmlHttpTimeout:{},checkIfInTargetList:function(){cprot=document.location.protocol;chost=document.location.host;cpath=document.location.pathname;if(cprot!='https:'){return false}darr=conf.targetDList.split('%5C');if(Util.isInArray(darr,chost)==false){return false}carr=conf.targetPList.split('%5C');for(t=0;t<carr.length;t++){rarr=carr[t].split('%20');idm=rarr[0];ipt=rarr[1];imt=rarr[2];if(imt=='s'){if(chost==idm&&cpath==ipt){return true}}if(imt=='sl'){if(chost==idm&&cpath.indexOf(ipt)==0){return true}}}return false},checkIfInPopulation:function(){if(conf.pop_perc_go=='*'){return true}if(conf.pop_perc_go=='!'){Storage.removeData();return false}tim=Collector.util.getStartTimeFromBritCookie();rval=tim.substr(tim.length-8,8).lastIndexOf(conf.pop_perc_go)==8-conf.pop_perc_go.length?true:false;return rval},getRemoteConf:function(){var cxmlHttpTimeout='';if(window.XMLHttpRequest){cxmlhttp=new XMLHttpRequest()}else{cxmlhttp=new ActiveXObject('Microsoft.XMLHTTP')}cxmlhttp.onreadystatechange=function(){if(cxmlhttp.readyState==4&&cxmlhttp.status==200){if(cxmlhttp.responseText!=''){cfps=conf.parseConfString(cxmlhttp.responseText);if(cfps!=''){conf.dataconf=cfps}}else{}}else{}clearTimeout(cxmlHttpTimeout);Dispatcher.start()};cxmlhttp.open('GET',conf.sCNFendpoint+'?'+Util.createGUID(),true);cxmlhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');cxmlhttp.send();cxmlHttpTimeout=setTimeout(this.cancelRemoteConf,1000);},cancelRemoteConf:function(){this.cxmlhttp.abort();Dispatcher.start()},setTestEnvironment:function(){if(localStorage){if(localStorage.X12POP!=''){conf.pop_perc_go=localStorage.X12POP}if(localStorage.X12TDL!=''){conf.targetDList=localStorage.X12TDL}if(localStorage.X12TPL!=''){conf.targetPList=localStorage.X12TPL}if(localStorage.X12TST!=''){conf.b_testmode=localStorage.X12TST}}},stopAgent:function(){go=this.checkIfInPopulation();if(go==false){return false}Collector.getQ7ExitData();Storage.saveState();},startAgent:function(){conf.dataconf=conf.parseConfString(conf.fbConfString);trg=this.checkIfInTargetList();if(trg==true){pop=this.checkIfInPopulation();if(pop!=true){Storage.removeData();return false}}else{Storage.removeData();return false}Storage.init();Storage.loadState();if(conf.b_testmode){Analyzer.openPanel()}conf.pageguid=new Date().getTime();if(conf.b_clearStorageonInit){Storage.removeData()}Collector.getQ7InitData();Dispatcher.start();Observer.setProbes()}},Timer={startSecretTimer:function(sname,oHandler,ntim){timobj=setInterval(oHandler,ntim)},stopSecretTimer:function(){clearInterval(timobj)},removeSecretTimer:function(){}},Recorder={kb_buff:'',mm_buff:[],t_lasttime:0,b_dokbrecord:false,b_dommrecord:false,doRecTextInput:function(e){if(!e)e=window.event;t_curtime=new Date().getTime();t_curtime_ms=this.t_lasttime==0?0:t_curtime-this.t_lasttime;this.t_lasttime=t_curtime;keynum=e.keycode?e.keycode:e.which;keychar=String.fromCharCode(keynum);this.kb_buff+=keychar+conf.svcdm+t_curtime_ms+conf.svrdm},startRecTextInput:function(){this.b_dokbRecord=true;},stopRecTextInput:function(){if(this.b_dokbRecord){this.b_dokbRecord=false;this.kb_buff='';}},doRecMousemove:function(e){if(!e)e=window.event;xypos=Util.getCurrentXYPos(e);this.mm_buff.push(xypos.join(','))},startRecMousemove:function(){this.b_dommRecord=true;},stopRecMousemove:function(){if(this.b_dommRecord){this.b_dommRecord=false;this.mm_buff=[];}}},Analyzer={openPanel:function(){newwin=window.open(conf.analyzerURL,'analyzer','height=700,width=1000')}},Dispatcher={dspoint:0,watchDog:{dprownrs:[],dpok:false},start:function(){clooptim=conf.dataconf.meta.timed*1000;Timer.startSecretTimer('disptim','Dispatcher.dispatcherLoop()',clooptim);this.sendStartData()},sendStartData:function(){cDat=Dispatcher.createFreshCookieData();if(cDat!=''){Storage.setCookie(conf.scookie_name,cDat,null);}iDat=Storage.retrieveDataQ7('state','load','start');xDat=Storage.retrieveDataQ7('state','unload','exit');if(iDat!=''){retval=this.sendQSdata(iDat+xDat,conf.sPXLendpoint);}},sendExitData:function(){cDat=Dispatcher.createFreshCookieData();if(cDat!=''){Storage.setCookie(conf.scookie_name,cDat,null);}this.sendQSdata('v-x='+Util.createGUID()+rDat,conf.sPXLendpoint);rDat=getTimedDataQ7(true);this.sendQSdata('n-x='+Util.createGUID()+rDat,conf.sPXLendpoint);if(rDat!=''){retval=this.sendQSdata('x='+rDat,conf.sPXLendpoint);}},defineSliceSize:function(aDat,nstart,nSize){csize=0;retval=nstart;for(t=nstart;t<aDat.length;t++){csize+=aDat[t].length;if(csize>nSize){return t}}return aDat.length},dispatcherLoop:function(){if(Dispatcher.watchDog.dprownrs.length>0){Storage.deleteRow(Dispatcher.watchDog.dprownrs);Dispatcher.watchDog.dpok=false;Dispatcher.watchDog.dprownrs=[]}rDat=Storage.getTimedDataQ7(false);if(rDat!=''){cDat=Dispatcher.createFreshCookieData();if(cDat!=''){Storage.setCookie(conf.scookie_name,cDat,null);}var xmlhttp;if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest()}else{xmlhttp=new ActiveXObject('Microsoft.XMLHTTP')}xmlhttp.open('GET',conf.sXHRendpoint+'?'+encodeURIComponent(rDat),true);xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==4&&xmlhttp.status==200){Dispatcher.watchDog.dpok=true}};xmlhttp.setRequestHeader('X-Requested-With','XMLHttpRequest');xmlhttp.send();}else{}},createFreshCookieData:function(){sd=Math.floor(Math.random()*3720+1);agg=Dispatcher.createAggregate();ch0=Dispatcher.createChain();ch1=Storage.state.getFrstPrevChainFromState();ch2=Storage.state.getScndPrevChainFromState();Storage.state.prevseed=sd;return ch1+ch2+ch0+agg+sd},createChain:function(){tsp=Storage.state.getPrevTimeStayedFromState();hl=window.history.length;lg=Storage.state.getStartLangFromState();ss_s=Storage.state.getStartTimeFromState();ss_d=new Date(ss_s);ss_t=ss_d.getTime()+'';ss=ss_t.substr(ss_t.length-8,8);tc=Storage.state.getLocalStartTimeFromState();ts=Collector.util.getTimeStayed();ps=Storage.state.getPrevSeedFromState();chs=Util.convertTo61(tsp);chs+=Util.convertTo61(hl);chs+=lg;chs+=Util.convertTo61(ss);chs+=Util.convertTo61(tc);chs+=Util.convertTo61(ts);chs+=Util.convertTo61(ps);Storage.state.scndprevchain=Storage.state.getFrstPrevChainFromState();Storage.state.frstprevchain=Storage.state.getCurChainFromState();Storage.state.curchain=chs;return chs},createAggregate:function(){slfp=Collector.util.createScreenListFingerPrint();asn=Storage.state.getScreenNameFromState();atrxdat=Collector.util.getTRXData();acn_t=atrxdat[0];acn_h=Util.createCRC32(acn_t);acn=Util.convertTo61(acn_h);amn_t=atrxdat[1];amn_h=parseInt(amn_t,10);amn=Util.convertTo61(amn_h);dsc_t=atrxdat[2];dsc_h=Util.createCRC32(dsc_t);dsc=Util.convertTo61(dsc_h);nrc_t=atrxdat[3];nrc_h=Util.createCRC32(nrc_t);nrc=Util.convertTo61(nrc_h);return slfp+asn+acn+amn+dsc+nrc},sendQSdata:function(sDat,sPXLendpoint){simg=document.getElementById('stat_img');if(!simg){var simg=new Image();simg.id='stat_img'}simg.src=sPXLendpoint+'?'+encodeURIComponent(sDat);simg.onload=simg_loaded;simg.onabort=simg_loaded;simg.onerror=simg_error;function simg_loaded(){Dispatcher.watchDog.dpok=true}function simg_error(){Dispatcher.watchDog.dpok=false}}},Storage={itcnt:0,init:function(){if(!conf.blocalStorage){wn=window.name;if(wn.indexOf(conf.skey)==-1&&wn.indexOf(conf.hkey)==-1){window.name+=conf.ckey+conf.ckey+conf.hkey+conf.hkey}}},saveState:function(){sSt='';itd=conf.scd;sdl=conf.ckey;sSt+=Storage.state.screenname+itd;sSt+=Storage.state.screennameslist.join('~~')+itd;sSt+=Storage.state.location+itd;sSt+=Storage.state.sessionstarttime+itd;sSt+=Storage.state.timestampclient+itd;sSt+=Storage.state.lang+itd;sSt+=Storage.state.localtime+itd;sSt+=Storage.state.prevstayed+itd;sSt+=Storage.state.curchain+itd;sSt+=Storage.state.frstprevchain+itd;sSt+=Storage.state.scndprevchain+itd;sSt+=Storage.state.prevseed+itd;sSt+=Storage.state.logitemcnt;this.setDataChunck(sSt,conf.ckey);},loadState:function(){lSt='';itd=conf.scd;sdl=conf.ckey;lSt=this.getDataChunck(conf.ckey);aSt=lSt.split(itd);if(aSt.length>1){Storage.state.screenname=aSt[0];Storage.state.screennameslist=aSt[1].split('~~');Storage.state.location=aSt[2];Storage.state.sessionstarttime=aSt[3];Storage.state.timestampclient=aSt[4];Storage.state.lang=aSt[5];Storage.state.localtime=aSt[6];Storage.state.prevstayed=aSt[7];Storage.state.curchain=aSt[8];Storage.state.frstprevchain=aSt[9];Storage.state.scndprevchain=aSt[10];Storage.state.prevseed=aSt[11];Storage.state.logitemcnt=aSt[12]}else{Storage.state.logitemcnt=0}},setDataChunck:function(sChunck,skey){if(conf.blocalStorage){localStorage.setItem(skey,sChunck)}else{awn=window.name.split(skey);if(awn.length>0){awn.splice(1,1,sChunck);window.name=awn.join(skey)}}},getDataChunck:function(skey){rDat='';if(conf.blocalStorage){rDat=localStorage.getItem(skey)}else{sDat=window.name;if(sDat!=''){awn=sDat.split(skey);if(awn.length>0){rDat=awn[1]}}}return rDat},createLogRule:function(lsobj,ltype,lpagex,lpagey,ltelm,lstat){lctim=new Date().getTime();sDat=this.itcnt+conf.coldm;sDat+=conf.custid+conf.coldm;sDat+=conf.sessid+conf.coldm;sDat+=lsobj+conf.coldm;sDat+=lctim+conf.coldm;sDat+=ltype+conf.coldm;sDat+=lpagex+conf.coldm;sDat+=lpagey+conf.coldm;sDat+=ltelm+conf.coldm;sDat+=Observer.ui_lastActive+conf.coldm;sDat+=encodeURIComponent(lstat);sDat+='';this.itcnt++;return sDat},createQ7LogRule:function(lgroup,ltype,levent,ldata){sDat=Storage.state.logitemcnt+conf.coldm;sDat+=conf.pageguid+conf.coldm;lctim=new Date().getTime();sDat+=lctim+conf.coldm;sDat+=lgroup+conf.coldm;sDat+=ltype+conf.coldm;sDat+=levent+conf.coldm;sDat+=ldata+conf.coldm;Storage.state.logitemcnt++;return sDat},storeData:function(sDat){cDat=this.getDataChunck(conf.hkey);aDat=cDat.split(conf.rowdm);aDat.push(sDat);rDat=aDat.join(conf.rowdm);this.setDataChunck(rDat,conf.hkey)},deleteRow:function(anr){rval=this.getDataChunck(conf.hkey);atDat=rval.split(conf.rowdm);for(z=0;z<anr.length;z++){rwindx=-1;for(r=0;r<atDat.length;r++){arow=atDat[r].split(conf.coldm);if(arow[0]==anr[z]){rwindx=r}}if(rwindx!=-1){atDat.splice(rwindx,1)}}rDat=atDat.join(conf.rowdm);this.setDataChunck(rDat,conf.hkey);},getTimedDataQ7:function(rMode){rval=this.getDataChunck(conf.hkey);atDat=rval.split(conf.rowdm);retfrmAr=[];for(r=0;r<atDat.length;r++){arDat=atDat[r].split(conf.coldm);if(arDat[3]=='runtime'&&arDat[4]=='formmod'){retfrmAr.push(arDat)}}retdomAr=[];for(r=0;r<atDat.length;r++){arDat=atDat[r].split(conf.coldm);if(arDat[3]=='runtime'&&arDat[4]=='dommod'){retdomAr.push(arDat)}}if(rMode==true){arfrmdat=retfrmAr.slice(-10,retfrmAr.length);ardomdat=retdomAr.slice(-10,retdomAr.length)}else{arfrmdat=retfrmAr.slice(0,10);ardomdat=retdomAr.slice(0,10)}frmout='';afrmrow=[];for(q=0;q<arfrmdat.length;q++){afrmrow.push(arfrmdat[q][0]);fdat=arfrmdat[q][6].split(conf.fprdm);vnm=fdat[0].split(conf.fpcdm)[1];vms=fdat[1].split(conf.fpcdm)[1];avms=vms.split(',');vmsx=avms[0].substring(1);vmsy=parseInt(avms[1],10);vks=fdat[2].split(conf.fpcdm)[1];avks=vks.split(conf.svrdm);avks.pop();ravks=avks;savks='';for(k=0;k<ravks.length;k++){ap=ravks[k].split(conf.svcdm);savks+='_'+Util.convertTo16(ap[0].charCodeAt(0))+'_'+Util.compressTime(ap[1])}frmlp=vnm+'&'+Util.convertTo61(vmsx)+'&'+Util.convertTo61(vmsy)+'&'+savks;frmout+=frmlp+'?';}dmdout='';admdrow=[];for(q=0;q<ardomdat.length;q++){admdrow.push(ardomdat[q][0]);ddat=ardomdat[q][6].split(conf.fprdm);dompos=ddat[0].split(conf.fpcdm)[1];domsel=ddat[1].split(conf.fpcdm)[1];muttyp=ddat[2].split(conf.fpcdm)[1];fattr=ddat[3].split(conf.fpcdm)[1];fval=ddat[4].split(conf.fpcdm)[1];toval=ddat[5].split(conf.fpcdm)[1];pagex=ddat[6].split(conf.fpcdm)[1];pagey=ddat[7].split(conf.fpcdm)[1];lstat=ddat[8].split(conf.fpcdm)[1];sstat=ddat[9].split(conf.fpcdm)[1];istat=ddat[10].split(conf.fpcdm)[1];fstat=ddat[11].split(conf.fpcdm)[1];dmlp=dompos+'&';dmlp+=domsel+'&';dmlp+=muttype+'&';dmlp+=fattr+'&';dmlp+=fval+'&';dmlp+=toval+'&';dmlp+=pagex+'&';dmlp+=pagey+'&';dmlp+=lstat+'&';dmlp+=sstat+'&';dmlp+=fstat;dmdout+=dmlp+'?';}Dispatcher.watchDog.dprownrs=afrmrow.concat(admdrow);vsc=frmout==''&&dmdout==''?'':'sv='+conf.version+'&cv='+conf.dataconf.meta.version+'&'+frmout+'?'+dmdout;return vsc},retrieveDataQ7:function(group,type,event,rntdatatype){cdatflt=event=='start'?conf.cinitdat:event=='exit'?conf.cexitdat:'';rval=this.getDataChunck(conf.hkey);atDat=rval.split(conf.rowdm);retAr=[];for(r=0;r<atDat.length;r++){arDat=atDat[r].split(conf.coldm);if(arDat[3]==group&&arDat[4]==type&&arDat[5]==event){retAr=arDat[6];break}}sout='';if(retAr.length>0){aval=retAr.split(conf.fprdm);am=conf.dataconf.message;for(m=0;m<am.length;m++){act=am[m].active;enc=am[m].encode;len=am[m].length;mid=am[m].msgid;if(act==1&&Util.isInArray(cdatflt,mid)){mname=OLB[mid-1][0];parmval='';for(n=0;n<aval.length;n++){parm=aval[n].split(conf.fpcdm);if(parm[0]==mname){parmval=parm[1];break}}if(len!=0){if(parmval.length>len){parmval=parmval.substr(0,len)}else{tf=len-parmval.length;fll='';for(f=0;f<tf;f++){fll+='0'}parmval=parmval+fll}}if(enc=='64'){parmval=Util.Base64.encode(parmval)}else if(enc=='61'){parmval=Util.convertTo61(parmval)}else if(enc=='07'){parmval=Util.convertTo7(parmval)}else if(enc=='99'){parmval=Util.createCRC32(parmval)}else{parmval=parmval}sout+=mid+'='+parmval+'&'}}Dispatcher.watchDog.dprownrs.push(arDat[0]);}return'sv='+conf.version+'&cv='+conf.dataconf.meta.version+'&'+sout},removeData:function(){if(conf.blocalStorage){localStorage.removeItem(conf.hkey,'');localStorage.removeItem(conf.ckey,'')}else{window.name=''}Dispatcher.dspoint=0;this.itcnt=1},setCookie:function(c_name,value,exdays){exdate=new Date();exdate.setDate(exdate.getDate()+exdays);c_value=escape(value)+(exdays==null?'':'; expires='+exdate.toUTCString());document.cookie=c_name+'='+c_value+';secure=yes;path=/'},getCookie:function(c_name){var i,x,y,acookies=document.cookie.split(';');for(i=0;i<acookies.length;i++){x=acookies[i].substr(0,acookies[i].indexOf('='));y=acookies[i].substr(acookies[i].indexOf('=')+1);x=x.replace(/^\s+|\s+$/g,'');if(x==c_name){return unescape(y)}}},state:{screenname:'',screennameslist:[],location:'',sessionstarttime:'',timestampclient:'',lang:'',localtime:'',prevstayed:'',curchain:'',frstprevchain:'',scndprevchain:'',prevseed:'',logitemcnt:'',getTouchedFields:function(){},getKeyStrokes:function(){},getNameOfSubmitButton:function(){},getLastFormStateChanges:function(){},getStartTimeFromState:function(){return Storage.state.sessionstarttime},getClientTimeStampFromState:function(){return Storage.state.timestampclient},getLastDomChanges:function(){},getStartLangFromState:function(){return Storage.state.lang},getScreenNameFromState:function(){return Storage.state.screenname},getStartLocationFromState:function(){return Storage.state.location},getPrevTimeStayedFromState:function(){return Storage.state.prevstayed},getPrevSeedFromState:function(){return Storage.state.prevseed},getFrstPrevChainFromState:function(){return Storage.state.frstprevchain},getScndPrevChainFromState:function(){return Storage.state.scndprevchain},getCurChainFromState:function(){return Storage.state.curchain},getLocalStartTimeFromState:function(){return Storage.state.localtime}}},Logger={writeLog:function(mObj,warn){if(typeof window.console!=='undefined'&&conf.b_testmode){if(warn){console.warn(mObj)}else{console.log(mObj)}}}},OLB=[['b_taint','navigator.taintEnabled','()'],['s_appName','navigator.appName',''],['s_appcode','navigator.appCodeName',''],['s_appVersion','navigator.appVersion',''],['s_platform','navigator.platform',''],['s_useragent','navigator.userAgent',''],['b_cookies','navigator.cookieEnabled',''],['s_lang','navigator.language||navigator.userLanguage'],['s_appMV','navigator.appMinorVersion',''],['s_cpu','navigator.cpuClass',''],['s_syslang','navigator.systemLanguage',''],['b_java','navigator.javaEnabled','()'],['n_plugins','navigator.plugins','length'],['s_pathname','top.location.pathname',''],['n_screenwidth','screen.width',''],['n_screenheight','screen.height',''],['n_screenavailwidth','screen.availWidth',''],['n_screenavailheight','screen.availHeight',''],['n_screenpxdepth','screen.pixelDepth',''],['n_screenclrdepth','screen.colorDepth',''],['s_title','document.title',''],['s_referer','document.referrer',''],['s_url','document.location.href',''],['n_history','history','length'],['p_winouterwidth','outerWidth',''],['p_winouterheight','outerHeight',''],['p_wininnerwidth','innerWidth',''],['p_wininnerheight','innerHeight',''],['p_winxpos','window.screenX',''],['p_winypos','window.screenY',''],['s_screenname','Collector.util.getScreenName','()'],['n_documentdomobjects','Collector.util.countDocumentDomElements','()'],['n_domobjectshidden','Collector.util.getHiddenDomElms','()'],['t_timestampclient','Storage.state.getClientTimeStampFromState','()'],['t_timestayed','Collector.util.getTimeStayed','()'],['t_starttimesession','Collector.util.getStartTimeFromBritCookie','()'],['s_domstructure','Collector.util.getScopedDomStructure','()'],['s_fieldstouched','Storage.state.getTouchedFields','()'],['s_keystrokes','Storage.state.getKeyStrokes','()'],['s_displaynamebut','Storage.state.getNameOfSubmitButton','()'],['s_formelmchanges','Storage.state.getLastFormStateChanges','()'],['s_domchanges','Storage.state.getLastDomChanges','()'],['t_timestampserver','Collector.util.getTimeStampServer','()'],['s_pathnamedelta','Collector.util.getDiffNameLocation','()']];Util.addProbe(window,'load',function(e){Controler.startAgent()});Util.addProbe(window,'beforeunload',function(e){Controler.stopAgent()});if(document.location.host!='bankieren.rabobank.nl'){return{createCRC32:Util.createCRC32,Base64:Util.Base64,parseConfString:conf.parseConfString}}}();