
<head>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {$(b).click(function()
        {
          document.getElementById("include").innerHTML = "<?php include('latihan.php'); 
          ?>";});
          $(document).on("click", "a.remove", function()
          {$(this).parent().remove(); }); });
  
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="">
    <div id="x" style="display: block;"> Halo dunia </div>
    <button id="x" onclick="document.getElementById('x').style.display = 'block'">Show</button>
    <button id="x" onclick="document.getElementById('x').style.display = 'none'">Show</button>
    <!-- <script>
      $(document).ready(function() { 
      $('x').click(function() {
        $('#x').toggle();
      })
      });
    </script> -->


    </form>
</body>
