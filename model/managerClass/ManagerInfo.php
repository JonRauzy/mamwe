<?php

namespace model\managerClass;

use PDO;
use Exception;
use model\mappingClass\MappingInfo;
use model\interfaceClass\ManagerInterface;
use model\mappingClass\MappingPicture;


// use ManagerInterface:

class ManagerInfo implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {   
        $this -> db = $db;
    }


    public function getOneById($id)
    {
        $sql = "SELECT * FROM mw_info WHERE mw_id_info = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id,PDO::PARAM_INT);
        $prepare -> execute();
        $result = $prepare -> fetch();
        if($result){
            return new MappingInfo($result);
        }else{
            throw new Exception("cette information $id n'existe pas" );
        }
    }


    public function getAll()
    {
        $sql = "SELECT i.* , mw_picture.mw_url_picture AS picture
        FROM mw_info i
        LEFT JOIN mw_picture ON mw_picture.mw_id_picture = i.mw_picture_mw_id_picture
        GROUP BY i.mw_id_info";
        
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $info = [];
        foreach ($result as $row){
            $info[] = new MappingInfo($row);               
        }
        return $info;
    }  


    public function insertInfo(MappingPicture $dataP = null, MappingInfo $dataI){

        $this->db->beginTransaction();

        if(!is_null($dataP)){
            $sqlPic = "INSERT INTO `mw_picture`(`mw_title_picture`, `mw_url_picture`) VALUES (:titlePic,:urlPic)";      
            $preparePic = $this->db->prepare($sqlPic);
            $preparePic->bindValue(':titlePic', $dataP->getMwTitlePicture(),PDO::PARAM_STR);
            $preparePic->bindValue(':urlPic', $dataP->getMwUrlPicture(),PDO::PARAM_STR);
    
            try{
                $preparePic->execute();
            }catch(Exception $e){
                echo $e->getMessage();
            }
            $lastId = $this->db->lastInsertId();
        } else {
            $lastId = null;
        }


        $sql = "INSERT INTO `mw_info`(`mw_name_info`, `mw_adress_info`, `mw_phone_info`, `mw_mail_info`, `mw_picture_mw_id_picture`) 
        VALUES (:name, :adress, :phone, :mail, :picture)";  

        $prepareInfo = $this->db->prepare($sql);
        $prepareInfo->bindValue(':name', $dataI->getMwNameInfo(), PDO::PARAM_STR);
        $prepareInfo->bindValue(':adress', $dataI->getMwAdressInfo(), PDO::PARAM_STR);
        $prepareInfo->bindValue(':phone', $dataI->getMwPhoneInfo(), PDO::PARAM_STR);
        $prepareInfo->bindValue(':mail', $dataI->getMwMailInfo(), PDO::PARAM_STR);
        $prepareInfo->bindValue(':picture', $lastId, PDO::PARAM_INT);
        $prepareInfo->execute();
        
        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $this->db->rollBack();
            echo $e -> getMessage();
        }
    }


    public function deleteInfo($id){
        $sql = "DELETE FROM mw_info WHERE mw_id_info = :id";
        $prepare = $this -> db -> prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);

        try{
            $prepare -> execute();    
            return true;   
        }catch(Exception $e){
            $e->getMessage();
        }
    }


    public function updateInfo(MappingPicture $dataP = null, MappingInfo $dataI){

        $this->db->beginTransaction();
        
        if(!is_null($dataP)){
            $idPic = $dataP->getMwIdPicture();
            $sqlPic = "UPDATE `mw_picture` 
                        SET `mw_title_picture`= :titlePic ,`mw_url_picture`= :urlPic
                        WHERE `mw_id_picture`= :idPic";      
            $preparePic = $this->db->prepare($sqlPic);
            $preparePic->bindValue(':titlePic', $dataP->getMwTitlePicture(),PDO::PARAM_STR);
            $preparePic->bindValue(':urlPic', $dataP->getMwUrlPicture(),PDO::PARAM_STR);
            $preparePic->bindValue(':idPic', $idPic, PDO::PARAM_INT);
    
            $preparePic->execute();
        } else {
            $idPic = null;
        }




        $sql =  "UPDATE `mw_info` 
                SET `mw_name_info`= :name, `mw_adress_info`= :adress, `mw_phone_info`= :phone, `mw_mail_info`= :mail,`mw_picture_mw_id_picture`= :picture 
                WHERE `mw_id_info`= :id";   
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':name', $dataI->getMwNameInfo(), PDO::PARAM_STR);
        $prepare->bindValue(':adress', $dataI->getMwAdressInfo(), PDO::PARAM_STR);
        $prepare->bindValue(':phone', $dataI->getMwPhoneInfo(), PDO::PARAM_STR);
        $prepare->bindValue(':mail', $dataI->getMwMailInfo(), PDO::PARAM_STR);
        $prepare->bindValue(':picture', $idPic, PDO::PARAM_INT);
        $prepare->bindValue(':id', $dataI -> getMwIdInfo(), PDO::PARAM_INT);

        $prepare->execute();

        try{
            $this->db->commit();
            return true;
        }catch(Exception $e){
            $e -> getMessage();
        } 

    }

}