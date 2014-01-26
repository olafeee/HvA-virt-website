/*
=======================================================================
= 						Plaintech loginmenu.js 						  =
=					  												  =
=======================================================================
*/

/*
* hide en show login menu
*/
function hideLoginMenu() {
   	//change display van button en div
    $(".kp_hm_div").css("display", "none");
    $(".kp_hm_ms").css("display", "block");
    $(".kp_hm_mh").css("display", "none");   
}

function showLoginMenu() {
    //change display van button en div
    $(".kp_hm_div").css("display", "block");
    $(".kp_hm_ms").css("display", "none");
    $(".kp_hm_mh").css("display", "block");

    // zorg er voor dat als er buiten class ".kp_hm_div" geklikt
    // de functie hideLoginMenu() wordt aangeroepen
	$('html').click(function() {
	hideLoginMenu()
	});
	$('.kp_hm_div').click(function(event){
    event.stopPropagation();
	});
}

function showSLAMenu() {
    //change display to block
    $(".SLAdiv").css("display", "block");
    $(".opacitySLAdiv").css("display", "block");

    // when clicked outside 
    // call the funtion 
    $('html').click(function() {
    hideSLAMenu()
    });
    $('.SLAdiv').click(function(event){
    event.stopPropagation();
    });
}

function hideSLAMenu() {
    //change display to none
    $(".SLAdiv").css("display", "none");
    $(".opacitySLAdiv").css("display", "none");  
}
 

function showMVP(id, Amount, Price) {
    //change display to block
    $(".MVPdiv").css("display", "block");
    $(".opacitySLAdiv").css("display", "block");
    $('.AmountMVP1').val(Amount);
    $('.idMVP').val(id);
     if (Amount == parseInt(Amount)){
        $('.AmountMVP1').val(Amount);
     }else{
         $('.AmountMVP1').val(Amount);
     }
        
    $('.PriceMVP').val(Price);
    // when clicked outside 
    // call the funtion 
    $('html').click(function() {
    hideMVP()
    });
    $('.MVPdiv').click(function(event){
    event.stopPropagation();
    });
}

function hideMVP() {
    //change display to none
    $(".Warningdiv").css("display", "none");
    $(".opacitySLAdiv").css("display", "none");  
}

function showWarning() {
    //change display to block
    $(".Warningdiv").css("display", "block");
    $(".opacitySLAdiv").css("display", "block");

    // when clicked outside 
    // call the funtion 
    $('html').click(function() {
    hideSLAMenu()
    });
    $('.Warningdiv').click(function(event){
    event.stopPropagation();
    });
}

function hideWarning() {
    //change display to none
    $(".Warningdiv").css("display", "none");
    $(".opacitySLAdiv").css("display", "none");  
}
          

function checkInp(){
    var x=document.forms["input"]["AmountMVP"].value;
    var y=document.forms["input"]["PriceMVP"].value;
    var page=document.forms["input"]["pageMVP"].value;

    if (page == "SLA") {
        if (isNaN(y)) 
          {
             $(".faultMVP").text(y+" is geen cijfer");
              return false;
          }
    }else{
        if (isNaN(x)) 
          {
            $(".faultMVP").text(x+" is geen cijfer");
            return false;
          }
        if (isNaN(y)) 
          {
             $(".faultMVP").text(y+" is geen cijfer");
              return false;
          }
    }  
}

function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

$(function () {
    setNavigation();
});

function setNavigation() {
    var path = window.location.pathname;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);

    $(".navCM a").each(function () {
        var href = $(this).attr('href');
         if (path === href) {
        //if (path.substring(0, href.length) === href) {
            $(this).closest('li').addClass('active');
        }
    });
}