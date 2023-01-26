<?php
require_once "../../shared/header.php";
?>

      <!-- page post  -->
      <div class="img-bg"></div>

      <div class="img-container">
        <div class="img">
          <img src="/blog/assets/11.jpg" alt="" />
        </div>
      </div>

      <div class="post-title">
        <h3>Software Developer vs Software Engineer</h3>
        <div class="user">
          <img src="/blog/assets/bx-user-circle.svg" alt="" />
          <p>Shehab Mohamed</p>
        </div>
      </div>

      <div class="post-body">
        <p>
          As a software engineer, you'll work in a constantly evolving
          environment, due to technological advances and the strategic direction
          of the organisation you work for. You'll create, maintain, audit and
          improve systems to meet particular needs, often as advised by a systems
          analyst or architect, testing both hard and software systems to diagnose
          and resolve system faults Contrary to popular belief, Lorem Ipsum is not
          simply random text. It has roots in a piece of classical Latin
          literature from 45 BC, making it over 2000 years old. Richard
          McClintock, a Latin professor at Hampden-Sydney College in Virginia,
          looked up one of the more obscure Latin words, consectetur, from a Lorem
          Ipsum passage, and going through the cites of the word in classical
          literature, discovered the undoubtable source. Lorem Ipsum comes from
          sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
          Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a
          treatise on the theory of ethics, very popular during the Renaissance.
          The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes
          from a line in section 1.10.32. The standard chunk of Lorem Ipsum used
          since the 1500s is reproduced below for those interested. Sections
          1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are
          also reproduced in their exact original form, accompanied by English
          versions from the 1914 translation by H. Rackham.
        </p>
      </div>

      <!-- post buttons  -->
      <div class="buttons">
        <div class="buttons-container">
          <button class="Edit" id="edit-post">Edit</button>
          <button form="fname" type="submit" class="Delete" name="post-delete-form" value="DELETE">Delete</button>
            <form action="/blog/control/post.php" method="post" id="fname">
                  <input type="hidden" name="id" value="1">
            </form>
        </div>
      </div>

      <!-- edit post form -->
      <div class="edit-modal modal-container">
        <div class="edit-modal modal-header">
          <button class="close-btn" id="edit-close-btn">&times;</button>
        </div>
        <div class="edit-modal modal-body">
          <form action="/blog/control/posts/post.php" method="POST">
            <!-- title -->
            <label for="title">
              Title
            </label>
            <input
              type="text"
              id="title"
              placeholder="type the post title.."
              name="title"
            />
            <!-- image -->
            <label for="image">
              Image
            </label>
            <input
              type="text"
              id="image"
              placeholder="type the post img number.."
              name="image"
            />
            <!-- body  -->
            <label for="body">
              Body
            </label>
            <textarea
              type="text"
              id="body"
              placeholder="type the post body.."
              name="body"
            ></textarea>
            <!-- buttons -->
            <input
              type="submit"
              value="Edit"
              id="submit-button"
              class="buttons"
              name="post-update-form"
            />
          </form>
        </div>
      </div>

    <div class="create-modal overlay"></div> 
    <div class="edit-modal overlay"></div> 

  </body>
</html>
