{pageaddvar name='javascript' value='javascript/jquery/jquery-1.7.0.min.js'}
{pageaddvar name='javascript' value='javascript/jquery/noconflict.js'}
{pageaddvar name='javascript' value='modules/Socialise/javascript/socialshareprivacy/jquery.socialshareprivacy.min.js'}
{pageaddvar name='stylesheet' value='modules/Socialise/javascript/socialshareprivacy/socialshareprivacy.css'}

<script type="text/javascript">
    jQuery(document).ready(function($){
      if($('#socialshareprivacy').length > 0){
        $('#socialshareprivacy').socialSharePrivacy(); 
      }
    });
</script>

<div id="socialshareprivacy"></div>