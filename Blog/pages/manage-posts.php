<?php
  // check if the user is not an admin
  if ( !isAdmin() ) {
    header("Location: /dashboard");
    exit;
  }

  // 1. connect to database
  $database = connectToDB();
  // 2. get all the users
    // 2.1
  $sql = "SELECT * FROM  posts";
  // 2.2
  $query = $database->query( $sql );
  // 2.3
  $query->execute();
  // 2.4
  $posts = $query->fetchAll();
?>

<?php require "parts/header.php"; ?>
<?php
    if(!isEditor()) {
      $posts = array_filter($posts, function($post) {
        return $post["user_id"] === $_SESSION["user"]["id"];
      });
    }
?>

  <body>
    <div class="container mx-auto my-5" style="max-width: 700px;">
    <!-- display success message -->
          <?php require ("parts/message_success.php"); ?>
          <!-- display error message -->
          <?php require ("parts/message_error.php"); ?>  
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Manage Posts</h1>
        <div class="text-end">
          <a href="/manage-posts-add" class="btn btn-primary btn-sm"
            >Add New Post</a
          >
        </div>
      </div>
      <div class="card mb-2 p-4">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col" style="width: 40%;">Title</th>
              <th scope="col">Status</th>
              <th scope="col" class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($posts as $post) : ?>
            <tr>
              <th scope="row"><?= $post["id"]; ?></th>
              <td><?= $post["title"]; ?></td>
              <?php if($post["status"] == "pending") : ?>
                <td><span class="badge bg-warning">Pending Review</span></td>
              <?php else : ?>
                <td><span class="badge bg-success">Published</span></td>
              <?php endif; ?>
              <td class="text-end">
                <div class="buttons">
                  <a href="/post?id=<?= $post["id"]; ?>" target="_blank" class="btn btn-primary btn-sm me-2 <?php if($post["status"] == "pending") : ?>disabled<?php endif; ?>">
                    <i class="bi bi-eye"></i>
                  </a>
                  <form action="/post/update" method="GET" class="d-inline">
                    <input type="hidden" name="id" value="<?= $post["id"]; ?>">
                    <button type="submit" class="btn btn-secondary btn-sm me-2">
                      <i class="bi bi-pencil"></i>
                    </button>
                  </form>
                  <form action="/post/delete" method="POST" class="d-inline">
                    <input type="hidden" name="id" value="<?= $post["id"]; ?>">
                    <button type="submit" class="btn btn-danger btn-sm">
                      <i class="bi bi-trash"></i>
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <div class="text-center">
        <a href="/dashboard" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Dashboard</a
        >
      </div>
    </div>

<?php require "parts/footer.php"; ?>