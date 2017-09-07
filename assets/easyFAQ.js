  jQuery(document).ready(function(){

  jQuery('.easy-faq-container li .title').click(function(){
    var clickedLi = jQuery(this).parent('li');
    var active_titles = jQuery('.easy-faq-container li .title.active');

    //Close any open ones when a user clicks on a new FAQ item or an open title
    active_titles.parent('li').find('.content').slideUp(200, function(){
     active_titles.removeClass('active');
    });

      if(clickedLi.find('.title').hasClass('active') == false){
      //Get the current clicked li, find it's child element (content) slide it in so it's visible and add the class active to the li's child element ('title')
       clickedLi.find('.content').slideDown(400, function(){
         clickedLi.find('.title').addClass('active');
       });
      }
   });


 });
