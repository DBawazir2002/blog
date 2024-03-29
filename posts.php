<?php
    include('include/header.php');
    if(!isset($_SESSION['id'])){
        echo "<div class='alert alert-danger'>" . "غير مسموح لك فتح هذه الصفحة" . "</div";
        header('REFRESH:2;URL=login.php');
      }
      else{
    include('classes/posts-contr.class.php');
    $posts = new PostsContr();
?>

<!-- Start Content -->
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2" id="side-area">
                    <h4>لوحة التحكم</h4>
                    <ul>
                        <li>
                            <a href="categories.php">
                                <span><i class="fas fa-tags"></i></span>
                                <span>التصنيفات</span>
                            </a>
                        </li>
                        <!-- Articles -->
                        <li data-toggle="collapse" data-target="#menu">
                            <a href="#">
                                <span><i class="far fa-newspaper"></i></span>
                                <span>المقالات</span>
                            </a>
                        </li>
                        <ul class="collapse" id="menu">
                            <li>
                                <a href="new-post.php">
                                    <span><i class="far fa-edit"></i></span>
                                    <span>مقال جديد</span>
                                </a>
                            </li>
                            <li>
                                <a href="posts.php">
                                    <span><i class="fas fa-th-large"></i></span>
                                    <span>كل المقالات</span>
                                </a>
                            </li>
                        </ul>
                        <li>
                            <a href="index.php" target="_blank">
                                <span><i class="fas fa-window-restore"></i></span>
                                <span>عرض الموقع</span>
                            </a>
                        </li>
                        <li>
                            <a href="logout.php">
                                <span><i class="fas fa-sign-out-alt"></i></span>
                                <span>تسجيل الخروج</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10" id="main-area">
                    <button class="custom-btn">كل المقالات</button>
                    <!-- Display all posts -->
                    <div class="display-data mt-4">

                      <?php
                      if(isset($_GET['id'])){
                        $id = $_GET['id'];
                
                         $delete = $posts->deleteSpecificPost($id);

                          if($delete == true){
                            echo "<div class='alert alert-success'>" . "تم حذف المقال بنجاح" . "</div>";
                          }
                          else{
                            echo "<div class='alert alert-danger'>" . "عفواً حدث خطأ ما" . "</div>";
                          }
                      }
                       ?>

                    <table class="table table-ordered">
                            <tr>
                                <th>رقم المقال</th>
                                <th>عنوان المقال</th>
                                <th>كاتب المقال</th>
                                <th>صورة المقال</th>
                                <th>تاريخ المقال</th>
                                <th>حذف المقال</th>
                                <th>تعديل المقال</th>
                            </tr>
                    <?php
                        $result = $posts->displayPosts();
                        $no = 0;
                        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                            $no++;
                            ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $row['postTitle'] ;?></td>
                                <td><?php echo $row['postAuthor'] ;?></td>
                                <td><img src="uploads/<?php echo $row['postImage'] ;?> " width="70px" height="50px"></td>
                                <td><?php echo $row['postDate'] ;?></td>
                                <td><a href="posts.php?id=<?php echo $row['id']; ?>"><button class="custom-btn">حذف المقال</button><a></td>
                                <td><a href="edit-post.php?id=<?php echo $row['id']; ?>"><button class="custom-btn">تعديل المقال</button><a></td>
                            </tr>

                            <?php
                        }
                    ?>
                  </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- End Content -->

<?php
    include('include/footer.php');
?>
<?php
      }
      ?>
