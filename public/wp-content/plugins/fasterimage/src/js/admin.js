/**
 * Created by phenix on 05/10/2015.
 */
jQuery(document).ready(function(){
   if(jQuery('#api_key_form').length > 0) {
       var html = '<div class="admin-page-framework-sectionset" id="' + jQuery('.admin-page-framework-sectionset').attr('id') + '">' + jQuery('.admin-page-framework-sectionset').html() + '</div>';
       jQuery('.admin-page-framework-sectionset').empty();
       jQuery('#api_key_form').html(html);

   }
});