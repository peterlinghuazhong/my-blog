<?php
    $database = connectDatabase();
    
    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];
    $status = $_POST["status"];

    if(empty($id) || empty($title) || empty($content) || empty($status)) {
        $_SESSION["error"] = "All fields are required";
        header("Location: /manage-posts-edit?id=". $id);
        exit;
    }

    $sql = "UPDATE  posts  SET title = :title, content = :content, status = :status WHERE id = :id";
    $statement = $database->prepare($sql);
    $statement->execute([
        "id" => $id,
        "title" => $title,
        "content" => $content,
        "status" => $status
    ]);

    $_SESSION["success"] = "Post updated successfully";
    header("Location: /manage-posts");
    exit;
?>