<?php
    namespace App\Controllers;
    use App\Models\product;
    use eftec\bladeone\BladeOne;
    // use App\Models\category;
    // $obj = new category;

    class ControllerPro extends product{
        public $view;

        function __construct()
        {
            $view = 'app/Views';
            $cache = 'app/cache';
            $this-> view=new BladeOne($view,$cache,BladeOne::MODE_AUTO);
        }
        function listProduct(){
            $pro = $this->listPro();
            return $this->view->run('listPro',['pro'=>$pro]);
        }

        function addProduct(){
            $cate = $this ->listAllCate();
            return $this->view->run('addPro',['cate'=>$cate]);
        }

        public function addIndex()
        {
            $this->addCtrl($_POST['name'],$_FILES['image'],$_POST['price'],$_POST['id_category']);
        }

        public function addCtrl($name,$image,$price, $id_category)
        {

            $target_dir =  "app/public/image/";
            $target_file = $target_dir.$image['name'];
            if(move_uploaded_file($image['tmp_name'], $target_file)) {
                $image_url = $target_file;
            }
            parent::addPro($name,$image_url,$price, $id_category);
            echo '<script>
            alert("Thêm thành công");
            window.location.href="http://localhost/PHP/Hoa/listPro";
        </script>';
        }


        function deletePro(){
            $id = isset($_GET['id'])? $_GET['id'] : null ; 
            $this->deleteMD($id);
            echo '<script>alert("Xóa sản phẩm thành công")
            window.location.href="http://localhost/PHP/Hoa/listPro";
            </script>';
        }

        function updateProductMD(){
            $id = isset($_GET['id']) ? $_GET['id']:null;
            $cate = $this-> listAllCate();
            // var_dump($cate);

            $pro = $this->updatePro($id);
            return $this->view->run('updatePro', ['pro'=>$pro,'cate'=>$cate]);
        }
        function updateIndex(){
            $this->updateMD($_POST['id'],$_POST['name'],$_FILES['image'],$_POST['price'],$_POST['id_category']);
        }
        function updateMD($id,$name,$image,$price, $id_category){
           
            $pro= $this->GetProByID($id);
            if($image['size'] != 0) {
            $target_dir =  "app/public/image/";
            $target_file = $target_dir.$image['name'];
                if(move_uploaded_file($image['tmp_name'], $target_file)) {
                    $image_url = $target_file;
                }
            } else {
                $image_url = $pro['image'];
            }
            parent::updateProduct($id,$name,$image_url,$price, $id_category);
           echo '<script>alert("Sửa sản phẩm thành công")
           window.location.href="http://localhost/PHP/Hoa/listPro";
        </script>';
        }
        /**
         * CATEGORY
         */
        function listCate(){
            $cate = $this->listAllCate();
            return $this->view->run('listCate', ['cate' => $cate]);
           
        }

        function addCate(){
            return $this->view->run('addCate');
        }
        
        function addLocaCtrl(){
            $this->addCategory($_POST['name_category']);
             echo '<script>alert("Thêm sản phẩm thành công")
            window.location.href="http://localhost/PHP/Hoa/listCate";
        </script>';
        }

        function deleteCate(){
            $id_cate = isset($_GET['id_cate']) ? $_GET['id_cate']:null;
            $this->deleteOneCategory($id_cate);
            echo '<script>alert("Xóa danh mục thành công")
            window.location.href="http://localhost/PHP/Hoa/listCate";
        </script>';
        }
    
        function updateCtCate(){
            $id_cate = isset($_GET['id_cate']) ? $_GET['id_cate']:null;
            $cate = $this->getcategory($id_cate);
            return $this->view->run('updateCate',['cate' => $cate]);
        }
        function updateSubmit(){
            if(isset($_POST['submit'])){
                $this->updatecategoryMD($_POST['id'],$_POST['name_category']);
                echo '<script>alert("Sửa sản phẩm thành công")
           window.location.href="http://localhost/PHP/Hoa/listCate";
        </script>';
            }
        }
        /**
         * LOGIN
         */
        function showLogin(){
            return $this->view->run('login');
        }
        function checkLogin(){
            if(isset($_POST['submit'])){
                $check = $this->checkUser($_POST['user'],$_POST['pass']);
                
                if(count($check) > 0 ){
                    $_SESSION['user'] = $this->getUser($_POST['user']);
                    if($_SESSION['user']['role']==0){
                          echo '<script>
                    alert("chào mừng đến với admin");
                    window.location.href="http://localhost/PHP/Hoa/listPro";
                </script>';
                    }
                    else{
                        echo '<script>
                        alert("chào mừng đến với trang chủ");
                        window.location.href="http://localhost/PHP/Hoa/webUser";
                    </script>';
                    }
                  
                }
                else{
                    echo '<script>
                    alert("Đăng nhập thất bại");
                    window.location.href="http://localhost/PHP/Hoa/";
                </script>';
                }
            }        
        }
        function outTK(){
            $this->Exit();
            header('Location: http://localhost/PHP/Hoa/');
        }

        function getWebUser(){
            return $this->view->run('webUser');
        }
        function getDetail(){
            return $this->view->run('products_detal');
        }
    }




?>
