<?php
  $js = base_url("assets/js");
?>
<!-- Footer -->
  </div>
    <!-- <footer class="py-5 bg-dark" style="position:fixed;left:0;bottom:0;width:100%;">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2021</p>
      </div>
    </footer> -->
  <script src="<?php echo $js; ?>/jquery.min.js"></script>
  <script src="<?php echo $js; ?>/bootstrap.min.js"></script>
  
  <script>
      $('#button_remove').click(function(){
          $('#form_remove').trigger("reset");
      });

      var id = 0;
        function nouvelChamp() {
            id++;
            var container = document.getElementById("container");
            var input = document.createElement("input");
            input.setAttribute("type", "date");
            input.setAttribute("class", "birthday" + id);
            input.setAttribute("name", "birthday" + id);
            input.setAttribute("title", "Date de naissance " + id);
            container.appendChild(input);
            container.innerHTML += "<br>";
        }
  </script>
  
  

</body>

</html>
