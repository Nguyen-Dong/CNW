<?php
class FlowerModel
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllFlower()
    {
        $stmt = $this->pdo->query("SELECT * FROM Flower");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addFlower($FlowerName, $Info, $Image)
    {
        $sql = "INSERT INTO Flower (FlowerName, Info, Image) VALUES (:FlowerName, :Info, :Image)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'FlowerName' => $FlowerName, 
            'Info' => $Info, 
            'Image' => $Image
        ]);
    }

    //Sửa
    public function updateFlower($FlowerID, $FlowerName, $Info, $Image)
    {
        $sql = "UPDATE Flower SET FlowerName = :FlowerName, Info = :Info, Image = :Image WHERE Id = :FlowerID";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'FlowerName' => $FlowerName,
            'Info' => $Info,
            'Image' => $Image,
            'FlowerID' => $FlowerID
        ]);
    }

    public function deleteFlower($FlowerID)
    {
        $sql = "DELETE FROM Flower WHERE Id = :FlowerID";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'FlowerID' => $FlowerID
        ]);
    }
}
?>
