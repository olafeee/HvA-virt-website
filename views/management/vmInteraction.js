$(function() {
  $( "#dialog-form" ).dialog({
    autoOpen: false,
    height: 300,
    width: 350,
    modal: true,
    buttons: {
      "Create an account": function() {
          $( this ).dialog( "close" );
        }
      },
      Cancel: function() {
        $( this ).dialog( "close" );
      }
    },
    close: function() {
      // On clode... do?
    }
  });

  $( ".openCmdButton" )
    .button()
    .click(function() {
      $( "#dialog-form" ).dialog( "open" );
  });
});


// ------------------------------------------------------ //
// Ajax response

$(document).ready(function() {
  $.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
  setInterval(function() {
    $('#vmContentWindow').load('/management/vminfo');
  }, 3000); // the "3000" here refers to the time to refresh the div.  it is in milliseconds. 
});

$(document).ready(function() {
  $.ajaxSetup({ cache: false }); // This part addresses an IE bug.  without it, IE will only load the first number and will never refresh
  setInterval(function() {
    $('#vmContentWindow').load('/management/vminfo');
  }, 3000); // the "3000" here refers to the time to refresh the div.  it is in milliseconds. 
});