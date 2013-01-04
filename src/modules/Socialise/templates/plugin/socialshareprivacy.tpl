{pageaddvar name='javascript' value='jquery'}
{pageaddvar name='javascript' value='modules/Socialise/javascript/socialshareprivacy/jquery.socialshareprivacy.min.js'}
{pageaddvar name='stylesheet' value='modules/Socialise/javascript/socialshareprivacy/socialshareprivacy/socialshareprivacy.css'}

<script type="text/javascript">
    jQuery(document).ready(function($){

        $('#socialshareprivacy').socialSharePrivacy(
        {
            services : {
                facebook : {
                    'dummy_img'  : Zikula.Config.baseURL+'modules/Socialise/javascript/socialshareprivacy/socialshareprivacy/images/dummy_facebook.png'
                },
                twitter : {
                    'dummy_img'  : Zikula.Config.baseURL+'modules/Socialise/javascript/socialshareprivacy/socialshareprivacy/images/dummy_twitter.png'
                },
                gplus : {
                    'dummy_img'  : Zikula.Config.baseURL+'modules/Socialise/javascript/socialshareprivacy/socialshareprivacy/images/dummy_gplus.png'
                }
            },
            'css_path' : Zikula.Config.baseURL+'modules/Socialise/javascript/socialshareprivacy/socialshareprivacy/socialshareprivacy.css'
        }

        ); 
    });
</script>

<div id="socialshareprivacy"></div>
