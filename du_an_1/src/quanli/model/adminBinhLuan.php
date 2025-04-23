<?php
class adminBinhLuan{
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }
  
    public function getAllBinhLuan() {
        $sql = "SELECT * FROM binh_luan";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
  
    public function insertBinhLuan($id, $id_nguoi_dung,$noi_dung,$ngay_binh_luan){
      try {
          $sql = 'INSERT INTO binh_luan (id, id_nguoi_dung,$noi_dung,ngay_binh_luan) VALUES (:id, :id_nguoi_dung,:noi_dung,ngay_binh_luan)';
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
              ':id'=>$id,
              ':id_nguoi_dung'=>$id_nguoi_dung,
              ':noi_dung'=>$noi_dung,
              ':ngay_binh_luan'=>$ngay_binh_luan,
              
           ]);
          return true;
      }catch (Exception $e){
          echo "lỗi" .$e->getMessage();
      }
  }
  
  public function getDetailBinhLuan($id){
      try {
          $sql = 'SELECT * FROM binh_luan WHERE id = :id';
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
              ':id' => $id
          ]);
          return $stmt->fetch();
      } catch (Exception $e) {
          echo 'Lỗi' . $e->getMessage();
      }
  }
  
  
  public function updateBinhLuan($id, $id_nguoi_dung,$noi_dung,$ngay_binh_luan){
      try {
          $sql = 'UPDATE binh_luan SET id=:id,id_nguoi_dung=:id_nguoi_dung, noi_dung=:noi_dung,ngay_binh_luan=:ngay_binh_luan WHERE id=:id;
          VALUES (:id,:id_nguoi_dung,:noi_dung,:ngay_binh_luan))';
          $stmt = $this->conn->prepare($sql);
          $stmt->execute([
              ':id' => $id,
              ':id_nguoi_dung'=>$id_nguoi_dung,
              ':noi_dung'=>$noi_dung,
              ':ngay_binh_luan'=>$ngay_binh_luan,
              
          ]);
          return true;
      } catch (Exception $e) {
          echo 'Lỗi' . $e->getMessage();
      }
  }
  
  
  public function destroyBinhLuan($id) {
    try {
        $sql = 'DELETE FROM binh_luan WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id ]);
            return true;
        }catch (Exception $e){
            echo "lỗi" .$e->getMessage();
        }
}

}