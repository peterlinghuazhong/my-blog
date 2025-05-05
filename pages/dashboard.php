<?php
 

  // Connect to Database
  $database = connectToDB();


  // 3. get the students data from the database
  // 3.1 - SQL command (recipe)
  $sql = "SELECT * FROM users";
  // 3.2 - prepare SQL query (prepare your material)
  $query = $database->prepare( $sql );
  // 3.3 - execute the SQL query (cook it)
  $query->execute();
  // 3.4 - fetch all the results from the query (eat)
  $students = $query->fetchAll();

  // var_dump( $students);

?>
  <?php require "parts/header.php"; ?>
  <div class="container mx-auto my-5" style="max-width: 800px;">
      <h1 class="h1 mb-4 text-center">Dashboard</h1>
      <div class="row">
        <div class="col">
          <div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title text-center">
                <div class="mb-1">
                  <i class="bi bi-pencil-square" style="font-size: 3rem;"></i>
                </div>
                Manage Posts
              </h5>
              <div class="text-center mt-3">
                <a href="/manage-posts" class="btn btn-primary btn-sm"
                  >Access</a
                >
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card mb-2">
            <div class="card-body">
              <h5 class="card-title text-center">
                <div class="mb-1">
                  <i class="bi bi-people" style="font-size: 3rem;"></i>
                </div>
                Manage Users
              </h5>
              <div class="text-center mt-3">
                <a href="/manage-users" class="btn btn-primary btn-sm"
                  >Access</a
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-4 text-center">
        <a href="index.html" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back</a
        >
      </div>
    </div>
    
    <?php require "parts/footer.php"; ?>