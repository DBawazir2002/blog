<?php
include('include/header.php');
if(!isset($_SESSION['id'])){
    echo "<div class='alert alert-danger'>" . "غير مسموح لك فتح هذه الصفحة" . "</div";
    header('REFRESH:2;URL=login.php');
  }
  else{
include('classes/newPost.class.php');
include('classes/newPost-contr.class.php');
$newPost = new NewPostContr();
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
                <button class="custom-btn">مقال جديد</button>
                <?php
                if (isset($_POST['add'])) {
                    $pTitle = $_POST['title'];
                    $pAuthor = $_POST['author'];
                    $pCat = $_POST['category'];
                    $pContent = $_POST['content'];
                    $pAdd = $_POST['add'];

                    // Image
                    $imageName = $_FILES['postImage']['name'];
                    $imageTmp = $_FILES['postImage']['tmp_name'];

                    $postImage = rand(0, 1000) . "_" . $imageName;
                    move_uploaded_file($imageTmp, "uploads\\" . $postImage);
                   
                    $result = $newPost->newPost($pTitle, $pAuthor, $pCat, $pContent, $postImage);

                    if (is_string($result)) {
                        echo $result;
                    } 
                    else
                    {
                        if($result == true)
                            echo "<div class='alert alert-success'>" . "تمت إضافة المنشور بنجاح" . "</div>";
                            $pTitle = " ";
                            $pAuthor = " ";
                            $pCat = " ";
                            $pContent = " ";
                            $imageName = " ";
                    }
                }

                ?>
                <div class="add-category">
                    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <!---->
                        <div class="form-group">
                            <label for="title">عنوان المقال</label>
                            <input type="text" name="title" class="form-control" value="<?php if (isset($pTitle)) {
                                                                                            echo $pTitle;
                                                                                        } ?>">
                        </div>
                        <div class="form-group">
                            <label for="title"> اسم الكاتب</label>
                            <input type="text" name="author" class="form-control" value="<?php if (isset($pAuthor)) {
                                                                                                echo $pAuthor;
                                                                                            } ?>">
                        </div>
                        <div class="form-group">
                            <label for="cate">التصنيف</label>
                            <select name="category" id="cate" class="form-control">
                                <option><?php if (isset($pCat)) {
                                            echo $pCat;
                                        } ?></option>
                                <?php

                                $result1 = $newPost->displayCategories();

                                while ($row = $result1->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                    <option><?php echo $row['categoryName']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="image">صورة المقال</label>
                            <input type="file" id="image" class="form-control" name="postImage" value="<?php if (isset($imageName)) {
                                                                                                            echo $imageName;
                                                                                                        } ?>">
                        </div>
                        <div class="form-group">
                            <label for="content">نص المقال</label>
                            <textarea id="" cols="30" rows="10" class="form-control" name="content"><?php if (isset($pContent)) {
                                                                                                        echo $pContent;
                                                                                                    } ?></textarea>
                        </div>
                        <button class="btn-custom mb-4" name="add">نشر المقالة</button>
                    </form>

                </div>
            </div>

            <!--jQuery-->
            <script src="js/jquery-3.4.1.min.js"></script>
            <!--Font Awesome-->
            <script src="https://kit.fontawesome.com/03757ac844.js"></script>
            <!--Bootstrap-->
            <script src="js/bootstrap.min.js"></script>
            </body>

            </html>
            <?php
  }
  ?>