<?php
class TechModel
{
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAllTech() {
        return $this->db->getAll('SELECT * FROM techniciens where technicien_actif=1 ORDER BY technicien;');
    }
}
