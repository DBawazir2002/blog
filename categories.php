<?php

    include('include/header.php');
    include('classes/categories-contr.class.php');
    
        // التأكد من وجود ال سيشن
    if(!isset($_SESSION['id'])){
      echo "<div class='alert alert-danger'>" . "غير مسموح لك فتح هذه الصفحة" . "</div";
      header('REFRESH:2;URL=login.php');
    }
    else{
     $cate = new CategoriesContr();
?>

<!-- Start Content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2" id="side-area">
                    <h4>لوحة التحكم</h4>
                    <ul>
                        <li>
                            <a href="">
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
                    <div class="add-category">
                    <?php
                            $id;
                          if(isset($_POST['add'])){
                            $cName = $_POST['category'];
                            $cAdd    = $_POST['add'];
                              if(empty($cName)){
                                  echo "<div class='alert alert-danger'>" . "حقل التصنيف فارغ" . "</div>";
                              }
                              else{
                                $w = $cate->setCategoryName($cName);
                                $re = $cate->categories($cName);
                              }
                          
                              $successInsert =  "<div class='alert alert-success'>" . "تمت الاضافة التصنيف بنجاح" . "</div>";
                                
                        }
                        if(isset($successInsert)){
                            echo $successInsert;
                        }
                           ?>
                        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label for="category">تصنيف جديد</label>
                                <input type="text" name="category" class="form-control">
                            </div>
                            <button class="btn-custom" name="add">إضافة</button>
                        </form>
                    </div>

                    <!-- Display Categories -->
                    <div class="display-data mt-5">
                    <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $delete = $cate->deleteCate($id);
                            if(isset($delete)){
                              $success =  "<div class='alert alert-success'>" . "تم حذف التصنيف بنجاح" . "</div>";
                            }
                            else{
                              $eror = "<div class='alert alert-danger'>" . "عفواً حدث خطأ ما" . "</div>";
                            }
                        }
                         ?>
                    <?php 
                            if(isset($success)){
                                echo $success;
                            }
                            if(isset($eror)){
                                echo $eror;
                            }
                            
                        ?>
                        <table class="table table-borderd">
                            <tr>
                                <th>رقم الفئة</th>
                                <th>إسم الفئة</th>
                                <th>تاريخ الإضافة</th>
                                <th>حذف التصنيف</th>
                            </tr>
                            <?php
                                $no;
                                $result = $cate->displayCategories();
                                $no = 0;
                                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                    $no++;
                                    ?>

                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $row['categoryName']; ?></td>
                                        <td><?php echo $row['categoryDate']; ?></td>
                                        <td><a href="categories.php?id=<?php echo $row['id']; ?>"><button class="custom-btn" name="submit">حذف التصنيف</button></a></td>
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
}
 ?>
<?php
    include('include/footer.php');
?>
