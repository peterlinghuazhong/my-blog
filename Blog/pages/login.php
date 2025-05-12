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

  <div class="container my-5 mx-auto" style="max-width: 500px;">
      <h1 class="h1 mb-4 text-center">Login</h1>
      <div class="card p-4">
 <!-- display success message --> 
 <?php require "parts/message_success.php"; ?>
            <!-- display error -->  
            <?php require ("parts/message_error.php"); ?>
            
            <!-- login form-->
        <form method="POST" action=" /auth/login ">
          <div class="mb-2">
            <label for="email" class="visually-hidden">Email</label>
            <input
              type="text"
              class="form-control"
              id="email"
              name="email"
              placeholder="email@example.com"
            />
          </div>
          <div class="mb-2">
            <label for="password" class="visually-hidden">Password</label>
            <input
              type="password"
              class="form-control"
              id="password"
              name="password"
              placeholder="Password"
            />
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">Login</button>
          </div>
        </form>
      </div>
      <!-- links -->
      <div
        class="d-flex justify-content-between align-items-center gap-3 mx-auto pt-3"
      >
        <a href="/" class="text-decoration-none small"
          ><i class="bi bi-arrow-left-circle"></i> Go back</a
        >
        <a href="/signup" class="text-decoration-none small"
          >Don't have an account? Sign up here
          <i class="bi bi-arrow-right-circle"></i
        ></a>
      </div>
    </div>

    <?php require "parts/footer.php"; ?>
