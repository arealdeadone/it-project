var body=document.getElementById('body');var innerPopup=document.getElementById('inner-popup');var menu={active:false};menu.ctrl=function(e){var time=350;var leavetime=time+200;if(e==true){menu.active=true;popup.setAttribute('class','popup active');setTimeout(function(){innerPopup.setAttribute('class','innerBox active');},time);body.setAttribute('class','no-scroll')}else{menu.active=false;body.setAttribute('class','');innerPopup.setAttribute('class','innerBox');setTimeout(function(){popup.setAttribute('class','popup');},leavetime);}}
function loadjscssfile(filename,filetype){if(filetype=="js"){var fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript")
fileref.setAttribute("src",filename)}else if(filetype=="css"){var fileref=document.createElement("link")
fileref.setAttribute("rel","stylesheet")
fileref.setAttribute("type","text/css")
fileref.setAttribute("href",filename)}if(typeof fileref!="undefined")document.getElementsByTagName("head")[0].appendChild(fileref)}window.onload=function(){var otimages=document.querySelectorAll('[data-src]');for(var i=0;i<otimages.length;i++){var s=otimages[i].getAttribute('data-src');otimages[i].src=s;}setTimeout(function(){loadjscssfile('//2016.techkriti.org/extras/analysis/a.js','js');loadjscssfile('//2016.techkriti.org/addcount/x.php?pageid=20','js');},100);}