<html>
   <script>
      function disableTable(){
      document.getElementById("tombol1").disabled = true;
      document.getElementById("tombol2").disabled = true;
      document.getElementById("tombol3").disabled = true;
      
      }
      function enableTable(){
      document.getElementById("tombol1").disabled = false;
      document.getElementById("tombol2").disabled = false;
      }

   </script>
   <body>
      <form>
            <button id="tombol1">cobacoba</button>
            <!-- place the table in a separate fieldset -->
            <table border="1">
                     <td>Name</td>
                     <td>Email</td>
                     <td>aksi</td>
                  <tr>
                     <td>admin</td>
                     <td>admin@gmail.com</td>
                     <td><button id="tombol2">coba</button></td>
                     <td><button id="tombol3">2</button></td>
                  </tr>
        </table>
           
         <button type="button" onclick="disableTable()">Disable Table</button>
         <button type="button" onclick="enableTable()">Enable Table</button>
      </form>
   </body>
</html>