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

    $('#idMVP').val(id);
    $('#AmountMVP').val(Amount);
    $('#PriceMVP').val(Price);
    // when clicked outside 
    // call the funtion 
    $('html').click(function() {
    hideMVP()
    });
    $('.SLAdiv').click(function(event){
    event.stopPropagation();
    });
}

function hideMVP() {
    //change display to none
    $(".MVPdiv").css("display", "none");
    $(".opacitySLAdiv").css("display", "none");  
}

// 
$(function () {
    setNavigation();
});

// zorgt ervoor dat 
function setNavigation() {
    var path = window.location.pathname;
    path = path.replace(/\/$/, "");
    path = decodeURIComponent(path);

    $(".nav_kp a").each(function () {
        var href = $(this).attr('href');
        if (path === href) {
            $(this).closest('li').addClass('active');
        }
    });
}