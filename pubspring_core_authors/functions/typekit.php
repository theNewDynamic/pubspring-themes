<?php
function typekit_script() { 
$typekit_id =  get_option('sm_typekit'); 
 if($typekit_id) {   
  ?> 

<!-- TypeKit -->
<script type="text/javascript">
  (function() {
    var config = {
      kitId: '<?php echo $typekit_id; ?>',
      scriptTimeout: 3000
    };
    var h=document.getElementsByTagName("html")[0];h.className+=" wf-loading";var t=setTimeout(function(){h.className=h.className.replace(/(\s|^)wf-loading(\s|$)/g," ");h.className+=" wf-inactive"},config.scriptTimeout);var tk=document.createElement("script"),d=false;tk.src='//use.typekit.net/'+config.kitId+'.js';tk.type="text/javascript";tk.async="true";tk.onload=tk.onreadystatechange=function(){var a=this.readyState;if(d||a&&a!="complete"&&a!="loaded")return;d=true;clearTimeout(t);try{Typekit.load(config)}catch(b){}};var s=document.getElementsByTagName("script")[0];s.parentNode.insertBefore(tk,s)
  })();
</script>
<!--  END TypeKit  -->
<?php } //END if $typekit_id
}
add_action('wp_head', 'typekit_script');