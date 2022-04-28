

<?php
class form1Model extends CI_Model
{
    public function getJk()
    {
        return $this->db
            ->query("SELECT * FROM jenis_kelamin")
            ->result();
    }
    public function getAgama()
    {
        return $this->db
            ->query("SELECT * FROM agama")
            ->result();
    }
    public function getStatus()
    {
        return $this->db
            ->query("SELECT * FROM status")
            ->result();
    }
    public function getGolDarah()
    {
        return $this->db
            ->query("SELECT * FROM gol_darah")
            ->result();
    }
    public function getRiwayat($where)
    {
        return $this->db
            ->query("SELECT * FROM riwayat WHERE segmen = '$where' ORDER BY date DESC LIMIT 8")
            ->result();
    }
    public function addData($value, $table)
    {
        return $this->db
            ->insert($table, $value);
    }
    public function addRiwayat($value)
    {
        return $this->db
            ->insert("riwayat", $value);
    }
    public function getDataById($id, $table)
    {
        return $this->db
            ->query("SELECT * FROM $table WHERE id='$id'")
            ->row();
    }
    public function editData($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function deleteData($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
