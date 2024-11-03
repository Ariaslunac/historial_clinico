<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function agregar_signos($datos)
    {
        $this->db->insert('signos_vitales', $datos);
        return $this->db->insert_id();
    }

}