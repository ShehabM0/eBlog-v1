<?php
if(!isset($_SESSION)) 
    session_start();

$posts = $_SESSION["posts"];

function checkForm($array, $keys)
{
    foreach($keys as $key)
        if(!isset($array["$key"]) || empty($array["$key"]))
            return false;
    return true;
}

function checkLength($array, $min_length=3, $max_length=100)
{
    foreach($array as $value)
        if(strlen($value) > $max_length || strlen($value) < $min_length)
            return false;
    return true;
}

function checkImg($image)
{
    if(str_contains($image,".jpg"))
        return true;
    return false;
}


if(isset($_POST["post-create-form"])) {   
    $valid_form = checkForm($_POST,["title", "image", "body"]);
    
    $title = $_POST['title'];
    $img = $_POST['image'];
    $body = $_POST['body'];

    $valid_input = checkLength([$title, $body]);
    $valid_img = checkImg($img);

    if($valid_form && $valid_input && $valid_img)
    {
        // Set logged user id & new post id
        $logged_user_id = $_SESSION['current_user']['id'];
        $new_post_id = count($_SESSION['posts']);
        $new_post_id++;

        // Create new post (as an associative array)
        $add_post = [
            "id" => $new_post_id, 
            "title" => $title, 
            "body" => $body,
            "img" => $img,
            "user_id" => $logged_user_id
        ];
        
        // push new post to other posts in session
        array_push($_SESSION['posts'], $add_post);

        $message = "Your post has been created successfully.";
        array_push($_SESSION['messages'], $message);
        header("location:/blog/pages/posts/show.php?id=$new_post_id");
    }
    // else: data is invalid, error & redirect to create
    else if(!$valid_form)
    {
        $message = "Invalid form.";
        array_push($_SESSION['messages'], $message);
        header("location:/blog/pages/posts/post.php");
    }
    // else: form is invalid (i.e. data is missing or empty)
    else
    {
        $message="Invalid data.";
        array_push($_SESSION['messages'], $message);
        header("location:/blog/pages/posts/post.php");
    }
}


if(isset($_POST["post-update-form"])) {
    $valid_form = checkForm($_POST,["title", "image", "body"]);

    $title = $_POST['title'];
    $img = $_POST['image'];
    $body = $_POST['body'];

    $valid_input = checkLength([$title,$body]);
    $valid_img = checkImg($img);

    // Get post id by the given id
    $post_id = $_POST['post_id'];

    //edit post
        //if: check post exists & check if user is the one who created the post
        // else: reject, 401 Unauthorized (user is trying to update someone else's post)

    if($valid_form && $valid_input && $valid_img)
    {
        // update post using the new values
        // Update the post in session posts
        $_SESSION['posts'][$post_id-1]['title']=$title;
        $_SESSION['posts'][$post_id-1]['img']=$img;
        $_SESSION['posts'][$post_id-1]['body']=$body;
    
        // Redirect to show.php with id = post_id
        $message="Your Post has been updated successfully.";
        array_push($_SESSION['messages'],$message);
        header("location: /blog/pages/posts/show.php?id=$post_id");
    }
    // else: form is invalid (something's missing or empty)
    else if(!$valid_form)
    {
        $message = "Invalid form.";
        array_push($_SESSION['messages'], $message);
        header("location: /blog/pages/posts/post.php?id=$post_id");
    }
    // else: data is invalid, error & redirect to edit with id = post_id
    else
    {
        $message = "Invalid data.";
        array_push($_SESSION['messages'], $message);
        header("location: /blog/pages/posts/post.php?id=$post_id");
    }
}


if(isset($_POST["post-delete-form"])) {
    $post_id=$_POST['id']; 
    
    // remove the post from session posts
    unset($_SESSION['posts'][$post_id-1]);
    
    // reset the index in session posts
    $keys = array_keys($_SESSION['posts']);
    $values = array_values($_SESSION['posts']);
    for($counter = 0; $counter < count($keys); $counter++)
    {
        $keys[$counter] = $counter;
        $values[$counter]['id'] = $counter+1;
    }
    unset($_SESSION["posts"]);
    $result = array_combine($keys, $values);
    $_SESSION['posts'] = $result;
    
    $message="Your Post has been deleted successfully.";
    array_push($_SESSION['messages'],$message);
    header("location: /blog/");  
}
?>
