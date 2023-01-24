<?php 
include("includes/header.html");
include("includes/db.php");
?>
<body>
  
    <div class="col-md-12">
      <div class="input_heading text-center">
        <h2>Output Table</h2>
      </div>

    <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Row</th>
            <th scope="col">ID</th>
            <th scope="col">Salutation</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Telephone</th>
            <th scope="col">Email</th>

          </tr>
        </thead>
        <tbody>

        <?php
          // Retrieve the data from the table
          $stmt = $db->query("SELECT email, id, salutation, fname, lname, tel 
                              FROM users");

          $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

          // Print the data in an HTML table
          
          //variable to count the row of the table
          $countRow = 0;

          foreach ($users as $user) {
              $countRow++;

              echo "<th scope='row'>".$countRow."</th>";
              echo "<td>".$user['id']."</td>";
              echo "<td>".$user['salutation']."</td>";
              echo "<td>".$user['fname']."</td>";
              echo "<td>".$user['lname']."</td>";
              echo "<td>".$user['tel']."</td>";
              echo "<td>".$user['email']."</td>";
              echo "</tr>";
          }
          echo "</tbody>";
          echo "</table>";

        ?>
          
        </tbody>
    </table>

</body>

<?php include("includes/footer.html")?>
