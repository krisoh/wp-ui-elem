jQuery(document).ready(function($) {

  // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
  var site_url=adm_object.url;
  jQuery.get(site_url, function(response) {
    var da= $(response).find("link");


    var array= $.each( da.prevObject, function( key, value ) {

      var stylesheet= value.rel;

      var ui_id= value.id;
      if (stylesheet != undefined &&  stylesheet == "stylesheet"){
        var div = document.getElementById('css-scipts');
        div.innerHTML += '<div class="item"><i class="large file outline middle aligned icon"></i><div class="content"> <a class="header" href="'+value.href+'" target="_blank">'+value.id+'</a> <div class="description">'+value.href+'</div></div></div>';
        if(value.href.indexOf("bootstrap")!= -1 &&  value.href.indexOf("3.")!= -1 && value.id.indexOf("wpUIbootstrap3") == -1){

          $('#bts3').addClass('green');
          document.getElementById('bootstrap3_chekbox').disabled = true;
          $('.lb_bootstrap3').popup();

        } else if(value.id!='undefined' && value.id.indexOf("wpUIbootstrap3")!= -1){
          $('#bts3').addClass('green');
        }

        if(value.href.indexOf("bootstrap")!= -1 &&  value.href.indexOf("4.0.0")!= -1 && value.id.indexOf("wpUIbootstrap4") == -1){
          $('#bts4').addClass('green');
          document.getElementById('bootstrap4_chekbox').disabled = true;
          $('.lb_bootstrap4').popup();

        }else if(value.id!='undefined' && value.id.indexOf("wpUIbootstrap4")!= -1){
          $('#bts4').addClass('green');

        }

        if(value.href.indexOf("semantic")!= -1 &&  value.href.indexOf("2.")!= -1 && value.id.indexOf("wpUiSemantic") == -1){
          $('#smui').addClass('green');
          $('.lb_semanticUi').popup();
          document.getElementById('bootstrap4_chekbox').disabled = true;

        }else if(value.id!='undefined' && value.id.indexOf("wpUiSemantic")!= -1){
          $('#smui').addClass('green');

        }

      }

    });
    $("#cslink").click(function(e) {
        e.preventDefault();
        if($('#bts3').hasClass('active')){
          document.getElementById('bootstrap3_chekbox').checked = true;
        }
      }
    );

  });
});