var CPUarray=[1,2,3,4,5,6,8,10,12,16]
var RAMarray=[512,1024,2048,3096,4096,6144,8192,12288,16384,24576,32768];
var DISKPriceArray = [4,4.4,4.8,5,6,7,11,13,18,23,26,32];
var NTarray = ["2000 GB", "4000 GB", "8000 GB","unlimited"];
var SLAarray =[["bronze",0],["silver",10],["gold",20]];

var standardValueNT;
var standardValueIPv4;
var SLAprice = SLAarray[0][1];

var CPUamount = CPUarr(standardValueCPU, "CPUAmount");
var RAMamount = RAMarray[standardValueRAM];
var DISKamount = tarr(standardValueDisk, "DiskAmount");
var NTamount = NTarray[standardValueNT];
var IPv4amount = standardValueIPv4;
var SLApacket = SLAarray[0];
var IPv4price;
var OSprice;

var totalOrderPrice;
var totalSoftwarePrice;
var totalServicePrice;
var costCPU;
var costRam;
var costDisk;
var costIPv4;
    
onload=function() { 
    var path = window.location.pathname.split('/')
    path = path[path.length - 1];
    if(path==1){
        standardValueCPU =0;
        standardValueRAM =0;
        standardValueDisk=0;
        standardValueNT=0;
        standardValueIPv4=0;
    }else if (path==2) {
        standardValueCPU =1;
        standardValueRAM =1;
        standardValueDisk=4;
        standardValueNT=1;
        standardValueIPv4=0;
    }else if (path==3) {
        standardValueCPU =3;
        standardValueRAM =2;
        standardValueDisk=5;
        standardValueNT=2;
        standardValueIPv4=0;
    }else if (path==4) {
        standardValueCPU =6;
        standardValueRAM =4;
        standardValueDisk=6;
        standardValueNT=3;
        standardValueIPv4=0;
    }
    else{
        standardValueCPU =2;
        standardValueRAM =2;
        standardValueDisk=2;
        standardValueNT=0;
        standardValueIPv4=0;
    }

CPUslider(); 
RAMslider();
DISKslider();
NTslider();
IPv4slider();
changeOSselected();
SLAradio(1);

changeCPU(standardValueCPU);
changeRAM(standardValueRAM);
changeDISK(standardValueDisk)
changeNT(standardValueNT);
changeIPv4(standardValueIPv4);

orderPrice();
softwarePrice();
servicePrice();
totalPrice();
} 


function CPUslider() {

    $( "#cpuslider" ).slider({
        value: standardValueCPU,
        max: 9,
        orientation: "horizontal",
        range: "min",
        animate: true,
        change: function(event, ui) {
            changeCPU(ui.value);
        }

    });    
}

function changeCPU(value){
    $('#hiddenChangeCPU').val(value);
    CPUamount = CPUarr(standardValueCPU,"CPUAmount");
    if (CPUamount>1) {
        CPUcore =' cores';
    }else{
        CPUcore =' core';
    } 
    $(".changeCPU").text(CPUamount + CPUcore);
    orderPrice();
}

function RAMslider() {

    $( "#ramslider" ).slider({
        value: standardValueRAM,
        max: 10,
        orientation: "horizontal",
        range: "min",
        animate: true,
        change: function(event, ui) {
            changeRAM(ui.value);
            
        }
    });
}

function changeRAM(value){
    $('#hiddenChangeRAM').val(value);
    RAMamount = RAMarray[value];
    $(".changeRAM").text(RAMamount+"MB");
    orderPrice();
}

function DISKslider() {

    $( "#DISKslider" ).slider({
        value: standardValueDisk,
        max: 11,
        orientation: "horizontal",
        range: "min",
        animate: true,
        change: function(event, ui) {
            changeDISK(ui.value);
           
        }
    });
}

function changeDISK(value){
    $('#hiddenChangeDISK').val(value);
    standardValueDisk = value;
    DISKamount = tarr(standardValueDisk, "DiskAmount");
    $(".changeDISK").text(DISKamount+"GB");
    orderPrice();
}

function NTslider() {

    $( "#NTslider" ).slider({
        value: standardValueNT,
        max: 3,
        orientation: "horizontal",
        range: "min",
        animate: true,
        change: function(event, ui) {
            changeNT(ui.value);
            
        }
    });
}

function changeNT(value){
    $('#hiddenChangeNT').val(value);
    standardValueNT = value;
    NTamount = NTarray[standardValueNT];
    $(".changeNT").text(NTamount);
    orderPrice();
}

function IPv4slider() {

    $( "#IPv4slider" ).slider({
        value: standardValueIPv4,
        max: 9,
        orientation: "horizontal",
        range: "min",
        animate: true,
        change: function(event, ui) {
            changeIPv4(ui.value);
            $('#hiddenChangeIPv4').attr('value', ui.value);
        }
    });
}

function changeIPv4(value){
    $('#hiddenChangeIPv4').val(value);
    IPv4amount = value+1;
    var adreschange;
    if (IPv4amount>1) {
        adreschange =' IPv4 addresses';
    }else{
        adreschange =' IPv4 address';
    } 

    $(".changeIPv4").text(IPv4amount + adreschange);
    $(".changeIPv4r").text(IPv4amount);
    orderPrice();
}

function changeOSselected(){
    $( "select" ).change(function() {
    
    var str = "";
    $( "select option:selected" ).each(function() {
        str += $( this ).text() + " ";
    });
    OSprice = 0;
    $(".changeOS").text( str );
    var test =  "windows server 2008 server";
    var bla = str.substr(0,7);
    if (bla == "Windows"){
        OSprice  = 7.50;
    }
     $('#hiddenChangeOS').val(str);
    softwarePrice();

    
})
    .trigger( "change" );



};

function SLAradio(value){
    switch(value){
    case 1:
        SLApacket = SLAarray[0][0];
        SLAprice = SLAarray[0][1];
        break;
    case 2:
        SLApacket = SLAarray[1][0];
        SLAprice = SLAarray[1][1];
        break;
    case 3:
        SLApacket = SLAarray[2][0];
        SLAprice = SLAarray[2][1];
        break;
    }
    servicePrice();
    $(".changeSLAradio").text(SLApacket);
    $('#hiddenChangeSLA').val(SLApacket);


}

function orderPrice(){
   costCPU =   parseInt(CPUarr(standardValueCPU, "CPUPrice"));
   costRam = RAMShorter(RAMamount)*2.00;
   costDisk = parseInt(tarr(standardValueDisk, "DiskPrice"));
   costNT = standardValueNT * 2;
   costIPv4 = IPv4amount-1;
   totalOrderPrice = costCPU+costRam+costDisk+costNT+costIPv4;
   totalOrderPrice = MathRound(totalOrderPrice)-0.01;
   $(".totalorderCost").text('\u20AC'+MathRound(totalOrderPrice));
   totalPrice();
}

function softwarePrice(){
    totalSoftwarePrice = OSprice;
    $(".softwarePrice").text('\u20AC'+MathRound(totalSoftwarePrice));
    totalPrice();
}

function servicePrice(){
    totalServicePrice = SLAprice;
      $(".servicePrice").text('\u20AC'+ MathRound(totalServicePrice));
    totalPrice();
}

function totalPrice(){
    var allcost = totalOrderPrice+totalSoftwarePrice+totalServicePrice;
    $(".totalPrice").text('\u20AC'+MathRound(allcost));
    $('#hiddenChangePrice').val(MathRound(allcost));
}

function MathRound(value){
    var price = Math.round(value*100)/100;
    return price.toFixed(2);
}

function RAMShorter(value){
    if (value>513) {
        var rounded_value = Math.floor(value/1000);
    }else{
        var rounded_value = 0.5;
    }
    return rounded_value;
}

function autofill(){
        var object = document.getElementsByName('name_textbox');
        object.item(0).value="Autofill successful.";    
    }

