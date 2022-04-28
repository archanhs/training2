

<?php
class form3Model extends CI_Model
{
    public function getPenjualan()
    {
        return $this->db
            ->query("SELECT * FROM penjualan")
            ->result();
    }
    public function getAdministrasi()
    {
        return $this->db
            ->query("SELECT * FROM administrasi")
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
