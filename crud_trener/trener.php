<?php
class Trener
{
    private PDO $db;
    public function __construct(PDO $db)
    {
        $this->db = $db;
    }
    public function create($meno, $opis, $obrazok)
    {
        $sql = "INSERT INTO treneri 
            (meno, opis, obrazok)
            VALUES (?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $meno,
            $opis,
            $obrazok
        ]);
    }
    public function getAll()
    {
        $sql = "SELECT * FROM treneri";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM treneri WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM treneri WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
    public function getPocetTrenerov()
    {
        $sql = "SELECT COUNT(*) as pocet FROM treneri";
        $stmt = $this->db->query($sql);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
