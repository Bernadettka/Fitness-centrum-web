<?php

class Klient
{
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM rezervacie ORDER BY id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM rezervacie WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(
        $meno,
        $priezvisko,
        $email,
        $tel,
        $trener,
        $stupen,
        $sprava
    ) {

        $sql = "INSERT INTO rezervacie
                (meno, priezvisko,email,tel,trener,stupen,sprava)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $meno,
            $priezvisko,
            $email,
            $tel,
            $trener,
            $stupen,
            $sprava
        ]);
    }

    public function update(
        $id,
        $meno,
        $priezvisko,
        $email,
        $tel,
        $trener,
        $sprava,
        $stupen
    ) {

        $sql = "UPDATE rezervacie
                SET meno = ?,
                    priezvisko = ?,
                    email = ?,
                    tel = ?,
                    trener = ?,
                    stupen = ?,
                    sprava = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $meno,
            $priezvisko,
            $email,
            $tel,
            $trener,
            $stupen,
            $sprava,
            $id
        ]);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM rezervacie WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }
}
