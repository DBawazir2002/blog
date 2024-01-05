<?php
 include('public/header.php');
 include('classes/posts-contr.class.php');
 if(isset($_GET['id'])){
    $post = new PostsContr();
 ?>
    <!-- Start Content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                  <?php
                        $id = $_GET['id'];
                        $res = $post->displaySpecificPost($id);
                        $row = $res->fetch(PDO::FETCH_ASSOC);
                        
                  ?>
                    <div class="post">
                        <div class="post-image">
                            <img src="uploads/<?php echo $row['postImage']; ?>">
                        </div>
                        <div class="post-title">
                            <h4><?php echo $row['postTitle']; ?></h4>
                        </div>
                        <div class="post-details">
                            <p class="post-info">
                                <span><i class="fas fa-user"></i><?php echo $row['postAuthor']; ?></span>
                                <span><i class="far fa-calendar-alt"></i><?php echo $row['postDate']; ?></span>
                                <span><i class="fas fa-tags"></i><?php echo $row['postCat']; ?></span>
                            </p>
                            <p class="postContent">
                              <?php echo $row['postContent']; ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Catagories -->
                    <div class="categories">
                        <h4>التصنيفات</h4>
                        <ul>
                          <?php
                            $result = $post->displayCategorieS();
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                              ?>
                            <li>
                                <a href="category.php?category=<?php echo $row['categoryName']; ?>">
                                    <span><i class="fas fa-tags"></i></span>
                                    <span><?php echo $row['categoryName']; ?></span>
                                </a>
                            </li>
                      <?php
                          }
                        ?>
                        </ul>
                    </div>
                    <!-- End Categories -->

                    <!-- Start Latest Posts -->
                    <div class="last-posts">
                        <h4>أحدث المنشورات</h4>
                        <ul>
                          <?php
                           $result1 = $post->displayLastsPosts();
                            while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
                              ?>
                            <li>
                                <a href="post.php?id=<?php echo $row['id']; ?>">
                                    <span class="span-image"><img src="uploads/<?php echo $row['postImage']; ?>" alt="image1"></span>
                                    <span><?php echo $row['postTitle']; ?></span>
                                </a>
                            </li>
                            <?php
                                }
                             ?>
                        </ul>
                    </div>
                    <!-- End Latest Posts -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->
<?php
  include('public/footer.php');
 }
 ?>
