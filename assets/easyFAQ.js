  jQuery(document).ready(function(){
   console.log("easyFAQ JS file has loaded!");

  jQuery('.easy-faq-container li .title').click(function(){
    var clickedLi = jQuery(this).parent('li');
      if(clickedLi.find('.title').hasClass('active')){
        //If the user clicks on the title again, it's probbably because they want to hide it
        jQuery('.easy-faq-container li .title.active').parent('li').find('.content').slideUp(200, function(){
         jQuery('.easy-faq-container li .title.active').removeClass('active');
        }); 
      }else{
        //Find any FAQ that is open, hide it's content and remove the active class.
         jQuery('.easy-faq-container li .title.active').parent('li').find('.content').slideUp(200, function(){
          jQuery('.easy-faq-container li .title.active').removeClass('active');
         });
         //Get the current clicked li, find it's child element (content) slide it in so it's visible and add the class active to the li's child element ('title')
        clickedLi.find('.content').slideDown(400, function(){
          clickedLi.find('.title').addClass('active');
        });
      }
   });


 });
