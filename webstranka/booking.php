<?php
class Booking
{
    private $databaza;

    public function __construct($db)
    {
        $this->databaza = $db;
    }

    public function zapisat_data($udaje)
    {
        $meno = htmlspecialchars(trim($udaje["meno"]));
        $priezvisko = htmlspecialchars(trim($udaje["priezvisko"]));
        $email = htmlspecialchars(trim($udaje["email"]));
        $tel = htmlspecialchars(trim($udaje["tel"]));
        $trener = htmlspecialchars(trim($udaje["trener"]));
        $stupen = htmlspecialchars(trim($udaje["stupen"]));
        $sprava = htmlspecialchars(trim($udaje["sprava"]));

        try {
            $sql = "INSERT INTO rezervacie (meno, priezvisko, email, tel, trener, stupen, sprava)
            VALUES (:meno, :priezvisko, :email, :tel, :trener, :stupen, :sprava)";

            $stmt = $this->databaza->prepare($sql);
            $stmt->execute([
                ":meno" => $meno,
                ":priezvisko" => $priezvisko,
                ":email" => $email,
                ":tel" => $tel,
                ":trener" => $trener,
                ":stupen" => $stupen,
                ":sprava" => $sprava
            ]);
            return true;
        } catch (PDOException $chyba) {
            return $chyba->getMessage();
        }
    }
}
