<?php
class sdmModel extends CI_Model
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
    public function getSdm()
    {
        return $this->db
            ->query("SELECT * FROM sdm")
            ->result();
    }
    public function getPdfBySdm($id)
    {
        return $this->db
            ->query("SELECT * FROM kontrak WHERE sdm = '$id'")
            ->row();
    }
    public function getSdmById($id)
    {
        return $this->db
            ->query("SELECT * FROM sdm WHERE id = '$id'")
            ->row();
    }
    public function getKontrakBySdm($id)
    {
        return $this->db
            ->query("SELECT * FROM kontrak WHERE sdm = '$id'")
            ->row();
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
    public function addSdm($value, $table)
    {
        return $this->db
            ->insert($table, $value);
    }
    public function addKontrak($value, $table)
    {
        return $this->db
            ->insert($table, $value);
    }
    public function updateSdm($where, $data, $table)
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
