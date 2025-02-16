<!-- Analytics -->
<?php if (Configure::read('debug') == 0):?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-3634799-2', 'auto');
 <?php if(isset($options)):?>
  ga('send', 'pageview', <?php echo json_encode($options, JSON_UNESCAPED_UNICODE)?>);
 <?php else:?>
  ga('send', 'pageview');
 <?php endif;?>

</script>
<?php endif;?>
