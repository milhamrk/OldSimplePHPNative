var nomor = 1;
slide();
function slide(){ doit = setInterval(function(){
$(".slider ul").animate({
	marginLeft: -($(".slider").width() * nomor)
})
$(".control").removeClass("active");
$("#"+nomor).addClass("active");
if(nomor == jml) nomor = 0; else nomor++;
},3000); }

function moveDown(){
	$('html, body').animate({scrollTop: $(".about").offset().top}, 1000);
}

function moveUp(){
	$('html, body').animate({scrollTop: $(".tops").offset().top}, 2000);
}
$(function(){
  var $clientcarousel = $('#clients-list');
  var clients = $clientcarousel.children().length;
  var clientwidth = (clients * 270); 
  $clientcarousel.css('width',clientwidth);
  var isPaused = false;
  
  var rotating = true;
  var clientspeed = 0;
  var seeclients = setInterval(function(){
  	if(!isPaused){
  		rotateClients();
  	}
  }, clientspeed);
  
  $(document).on({
    mouseenter: function(){
      rotating = false; 
    },
    mouseleave: function(){
      rotating = true;
    }
  }, '#clients');
  
  function rotateClients() {
    if(rotating != false) {
      var $first = $('#clients-list li:first');
      $first.animate({ 'margin-left': '-270px' }, 7000, "linear", function() {
        $first.remove().css({ 'margin-left': '0px' });
        $('#clients-list li:last').after($first);
      });
    }
  }
  // next = function(){
  // 	if(rotating != false) {
  //     var $first = $('#clients-list li:first');
  //     $first.animate({ 'margin-left': '-170px' }, 200, "linear", function() {
  //       $first.remove().css({ 'margin-left': '0px' });
  //       $('#clients-list li:last').after($first);
  //     });
  //   }
  //   isPaused=true;
  //   setTimeout(function(){
  //   	isPaused=false;
  //   },2000);
  // }

  // prev = function(){
  //   isPaused=true;
  //   setTimeout(function(){
  //   	isPaused=false;
  //   },2000);
  // }
 
});
