jQuery(document).ready(function(){
  console.log("easyFAQ JS file has loaded!");

  jQuery('.easy-faq-container li').click(function(){
      if(jQuery(this).find('.title').hasClass('active')){
          //do nothing
      }else{
          $('.easy-faq-container li .title.active').removeClass('active');
          // remove the class active from any lli .title that have the class active, and slide their content out
          // slide the content for $(this) down - so that the content is visible
          // add the class active to this li's .title
      }



  });
});
