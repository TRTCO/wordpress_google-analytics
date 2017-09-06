<?php
/**
* Plugin Name: Google Analytics Tracking 
* Plugin URI: https://github.com/TRTCO/wordpress_google-analytics
* Description: Adding Google Analytics code to the footer – with anonymized IP address and opt-out cookie (according to German Data Protection Act)
* Version: 1.0
* Author: Jens Ratzel
* Author URI: https://profiles.wordpress.org/jensratzel
* License: GNU GPLv3
*/

function analytics_tracking()
{
echo ‘<script>
var gaProperty = 'UA-xxxxxxxx-x';
var disableStr = 'ga-disable-' + gaProperty;
if (document.cookie.indexOf(disableStr + '=true') > -1) {
  window[disableStr] = true;
}
function gaOptout() {
  document.cookie = disableStr + '=true; expires=Thu, 31 Dec 2099 23:59:59 UTC; path=/';
  window[disableStr] = true;
}
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-xxxxxxxx-x', 'auto');
  ga('set', 'anonymizeIp', true);
  ga('send', 'pageview');
</script>

add_action( ‘wp_print_footer_scripts’, analytics_tracking );
