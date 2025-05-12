<?php

  // connect to database
  $database = connectToDB();

         $id = $_GET["id"] ?? "";

    if(empty($id)) {
        $_SESSION["error"] = "Post not found";
        header("Location: /manage-post");
        exit;
    }

    $post = getPostById($id);

    if(!$post) {
        $_SESSION["error"] = "Post not found";
        header("Location: /manage-post");
        exit;
    }
?>

  <body>
    <div class="container mx-auto my-5" style="max-width: 700px;">
      <?php require "parts/message_error.php"; ?>
      <div class="d-flex justify-content-between align-items-center mb-2">
        <h1 class="h1">Edit Post</h1>
      </div>
      <div class="card mb-2 p-4">
        <form method="POST" action="/user/add">
          <input type="hidden" name="id" value="<?= $post["id"]; ?>">
          <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input
              type="text"
              name="title"
              class="form-control"
              id="title"
              value="<?= $post["title"]; ?>"
            />
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" id="content" rows="10" name="content"><?= $post["content"]; ?></textarea>
          </div>

          <?php if(isAdmin()) : ?>
            <div class="mb-3">
              <label for="status" class="form-label">Status</label>
              <select class="form-control" id="status" name="status">
                <option value="pending" <?= $post["status"] == "pending" ? "selected" : "" ?>>Pending for Review</option>
                <option value="publish" <?= $post["status"] == "publish" ? "selected" : "" ?>>Publish</option>
              </select>
            </div>
          <?php else : ?>
            <input type="hidden" name="status" value="pending">
          <?php endif; ?>
          
          <div class="text-end">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <div class="text-center">
        <a href="/manage-posts" class="btn btn-link btn-sm"
          ><i class="bi bi-arrow-left"></i> Back to Posts</a
        >
      </div>
    </div>


<?php require "parts/footer.php"; ?>
