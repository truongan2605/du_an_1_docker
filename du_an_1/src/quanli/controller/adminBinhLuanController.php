<?php
class adminBinhLuanController{
        public $modelBinhLuan;
        public function __construct()
        {
            $this->modelBinhLuan= new adminBinhLuan();
        }
        public function danhsachbinhluan(){
        $listbinhluan = $this->modelBinhLuan->getAllBinhLuan();
            require_once './view/binh_luan/listBinhLuan.php';
        }

        public function delete_binh_luan($id){
            $id=$_GET['id_binh_luan'];
            $binhLuan=$this->modelBinhLuan->getDetailBinhLuan($id);
            if($binhLuan){
            $this->modelBinhLuan->destroyBinhLuan($id);
            }
                header('Location: ' . BASE_URL_QUANLI . '?act=binh-luan');
                exit();
            
        }
        
}