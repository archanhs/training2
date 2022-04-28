

<?php
class form4Model extends CI_Model
{
    public function getGajiPokok()
    {
        return $this->db
            ->query("SELECT * FROM gaji_pokok")
            ->result();
    }
    public function getGolongan()
    {
        return $this->db
            ->query("SELECT * FROM golongan ORDER BY golongan")
            ->result();
    }
    public function getGolonganById($id)
    {
        return $this->db
            ->query("SELECT * FROM golongan WHERE id = '$id'")
            ->row();
    }
    public function getSubGolongan()
    {
        return $this->db
            ->query("SELECT * FROM sub_golongan ORDER BY sub_golongan")
            ->result();
    }
    public function getSubGolonganById($id)
    {
        return $this->db
            ->query("SELECT sub_golongan.*,golongan.golongan as golongan_nama FROM sub_golongan INNER JOIN golongan ON golongan.id = sub_golongan.golongan WHERE sub_golongan.id='$id'")
            ->row();
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
