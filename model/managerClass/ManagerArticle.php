<?php

namespace model\managerClass;

use model\interfaceClass\ManagerInterface;
use model\mappingClass\MappingArticle;
use Exception;
use PDO;

// use ManagerInterface:

class ManagerArticle  implements ManagerInterface
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getOneById(int $id)
    {
        // requête sql + prepare + bindValue + execute + etc
        $prepare = $this->db->prepare("SELECT * FROM mw_article WHERE mw_id_article = :id");
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);

        // si on a un résultat, on hydrate un objet Article et on le retourne
        $prepare->execute();
            $result = $prepare->fetch();
            if ($result) {
                return new MappingArticle($result);
            } else {
                throw new Exception("L'article $id n'existe pas");
            }
        }



    public function getAll(){
        // requête sql + prepare + bindValue + execute + etc
        $sql = "SELECT * FROM mw_article";
        $prepare = $this->db->prepare($sql);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $articles = [];
        foreach ($result as $row){
            $articles[] = new MappingArticle($row);
        }
        return $articles;
    }
/*
    public function getArticleById($db, $id){
        $sql = "SELECT a.mw_id_article, a.mw_title_art, a.mw_content_art, a.mw_visible_art, a.mw_date_art, a.mw_section_mw_id_section, GROUP_CONCAT(s.mw_title_sect) as mw_title_sect, GROUP_CONCAT(s.mw_id_sect) as mw_id_sect FROM mw_article a JOIN mw_section s ON a.mw_section_mw_id_section = s.mw_id_sect WHERE a.mw_id_article = :id";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $articles = [];
        foreach ($result as $row){
            $articles[] = new MappingArticle($row);
        }
        return $articles;
    }

    public function getPictureByArticleId($db, $id){
        $sql = "SELECT p.mw_id_picture, p.mw_url_picture, p.mw_article_mw_id_article, a.mw_id_article FROM mw_picture p JOIN mw_article a ON p.mw_article_mw_id_article = a.mw_id_article WHERE p.mw_article_mw_id_article = :id";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        $prepare->execute();
        $result = $prepare->fetchAll();
        $pictures = [];
        foreach ($result as $row){
            $pictures[] = new MappingArticle($row);
        }
        return $pictures;
    }
*/public function getAllArticlesWithPictures($db) {
    $sql = "SELECT a.*, GROUP_CONCAT(p.mw_id_picture, '|||' , p.mw_url_picture SEPARATOR '---') AS picture
    FROM mw_article a 
    LEFT JOIN mw_picture p ON p.mw_article_mw_id_article = a.mw_id_article
    GROUP BY a.mw_id_article";
    $prepare = $db->prepare($sql);
    $prepare->execute();
    $result = $prepare->fetchAll(PDO::FETCH_ASSOC);
    $articles = [];
    foreach ($result as $row) {
        $article = new MappingArticle([
            'mwIdArticle' => $row['mw_id_article'],
            'mwTitleArt' => $row['mw_title_art'],
            'mwContentArt' => $row['mw_content_art'],
            'mwDateArt' => $row['mw_date_art'],
            'mwVisibleArt' => $row['mw_visible_art'],
            'mwSectionMwIdSection' => $row['mw_section_mw_id_section']
        ]);

        if($row['picture']) {
            // Récupérer les images
            $pictures = explode('---', $row['picture']);

            // Ajouter les images dans le tableau
            foreach ($pictures as $picture) {
                if(strpos($picture, '|||') !== false) {
                    list($picture_id, $picture_url) = explode('|||', $picture);
                    $articlePicture = new MappingArticle([
                        'mwIdPicture' => $picture_id,
                        'mwUrlPicture' => $picture_url
                    ]);
                    $article->pictures[] = $articlePicture;
                }
            }
        }

        $articles[] = $article;
    }
    return $articles;
}


    public function insert($article)
    {
        // requête sql + prepare + bindValue + execute + etc
        $sql = "INSERT INTO mw_article (mw_title_art, mw_content_art, mw_visible_art, mw_section_mw_id_section) VALUES (:mw_title_art, :mw_content_art,  :mw_visible_art, :mw_section_mw_id_section)";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':mw_title_art', $article->getMwTitleArt(), PDO::PARAM_STR);
        $prepare->bindValue(':mw_content_art', $article->getMwContentArt(), PDO::PARAM_STR);
        $prepare->bindValue(':mw_visible_art', $article->getMwVisibleArt(), PDO::PARAM_INT);
        $prepare->bindValue(':mw_section_mw_id_section', $article->getMwSectionMwIdSection(), PDO::PARAM_INT);
        $prepare->execute();

        $article->setMwIdArticle($this->db->lastInsertId());
        return $article;

    }

    public function deleteEx($article, $id){
        $sql = "DELETE FROM mw_article WHERE mw_id_article = :id";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':id', $id, PDO::PARAM_INT);
        $prepare->execute();

        $article->setMwIdArticle($this->db->lastInsertId());
        return $article;
    }


    public function updateEx($article, $id){
        $sql = "UPDATE mw_article SET mw_title_art = :mw_title_art, mw_content_art = :mw_content_art, mw_visible_art = :mw_visible_art, mw_section_mw_id_section = :mw_section_mw_id_section WHERE mw_id_article = :id";
        $prepare = $this->db->prepare($sql);
        $prepare->bindValue(':mw_title_art', $article->getMwTitleArt(), PDO::PARAM_STR);
        $prepare->bindValue(':mw_content_art', $article->getMwContentArt(), PDO::PARAM_STR);
        $prepare->bindValue(':mw_visible_art', $article->getMwVisibleArt(), PDO::PARAM_INT);
        $prepare->bindValue(':mw_section_mw_id_section', $article->getMwSectionMwIdSection(), PDO::PARAM_INT);
        $prepare->bindValue(':id', $article->getMwIdArticle(), PDO::PARAM_INT);
        $prepare->execute();

        $article->setMwIdArticle($this->db->lastInsertId());
        return $article;

    }

}