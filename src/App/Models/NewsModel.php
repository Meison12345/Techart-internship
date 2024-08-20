<?php

namespace App\Models;

use App\Models\DataBase;
use PDO;

class NewsModel
{
    public function getCount()
    {
        $sql = "SELECT COUNT(*) FROM news";
        return DataBase::getConnection()->query($sql)->fetchColumn();
    }

    public function getLast()
    {
        $sql = "SELECT * FROM news ORDER BY date DESC LIMIT 1";
        return DataBase::getConnection()->query($sql)->fetch();
    }

    public function getRows($offset, $limit)
    {
        $sql = "SELECT *, DATE_FORMAT(date, '%d.%m.%Y') as dateformated FROM news ORDER BY date DESC LIMIT :limit OFFSET :offset";
        $stmt = DataBase::getConnection()->prepare($sql);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getRowsData()
    {
        $sql = "SELECT *, DATE_FORMAT(date, '%d.%m.%Y') as dateformated FROM news ORDER BY date DESC";
        return DataBase::getConnection()->query($sql)->fetch();
    }

    public function getItem($id)
    {
        $sql = "SELECT *, DATE_FORMAT(date, '%d.%m.%Y') AS dateformated FROM news WHERE id = ?";
        $stmt = DataBase::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
}
