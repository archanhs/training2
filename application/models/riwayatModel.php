

<?php
class riwayatModel extends CI_Model
{
    public function getRiwayat($table)
    {
        return $this->db
            ->query("SELECT * FROM riwayat WHERE segmen = '$table' ORDER BY date DESC")
            ->result();
    }
}
