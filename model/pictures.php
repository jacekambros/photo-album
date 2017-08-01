<?php
/**
 * Created by PhpStorm.
 * User: cgpe
 * Date: 2017-07-25
 * Time: 13:17
 */

/**
 * model/pictures.php
 * wymiana informacji z bazą
 */

include 'model/model.php';

class pictures_model extends model {
    // zapisanie w bazie nazw plików zdjęć z katalogu img
    public function insert_pictures(){
        $pic_files = scandir("img/");
        $pic_files_lenght = count($pic_files);

        for($i = 0; $i < $pic_files_lenght; $i++){
            $file_name = $pic_files[$i];
            if(substr($file_name,-3) == "JPG"){
                $insert = "INSERT INTO pictures (picture_file) VALUES ('".$file_name."');";
                $this->connection->query($insert);
            }
        }
    }

    public function getAll(){
        $select = "SELECT * FROM pictures";
        $select_repository = $this->connection->query($select);
        while($row = $select_repository->fetch_row()){
            $data[] = $row;
        }
        return $data;
    }

    public function getOne(){
        // if idObraz < 0 or id idObraz > MAX(picture_id)
        $firsId = $this->getFirstId();
        $lastId = $this->getLastId();

        if($_GET['idObraz'] < 1){
            $idObraz = $firsId;
        } elseif ($_GET['idObraz']>$lastId){
            $idObraz = $lastId;
        } else {
            $idObraz = $_GET['idObraz'];
        }

        $select = "SELECT * FROM pictures WHERE picture_id=".
            "(SELECT MIN(picture_id) FROM pictures WHERE picture_id >=".$idObraz.");";
        $select_repository = $this->connection->query($select);
        while($row = $select_repository->fetch_row()){
            $data[] = $row;
        }
        return $data;
    }

    private function getFirstId(){
        $select = "SELECT MIN(picture_id) as firstId FROM pictures";
        $result = $this->connection->query($select);
        return $result->fetch_row()[0];

    }
    private function getLastId(){
        $select = "SELECT MAX(picture_id) as firstId FROM pictures";
        $result = $this->connection->query($select);
        return $result->fetch_row()[0];

    }

    public function save($data){
        $_SESSION['defaultTitle'] = $data['title'];
        $_SESSION['defaultDescription'] = $data['description'];
        $update = "UPDATE pictures SET picture_title='".$data['title']."', picture_description='".$data['description'].
            "' WHERE picture_file='".$data['file']."';";
        $this->connection->query($update);
    }



    public function atrapa(){
        print("<h1>ATRAPA (pictures_model->atrapa)</h1>");
    }

}