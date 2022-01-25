<?php

class PrincipalModel extends CI_Model  {
    
    public function __construct()
    {
        parent::__construct();

        $db = $this->load->database();
    }


	function get_torcedores($documento = false)
	{
        if($documento){
            $query= $this->db->get_where('torcedores', array('documento' => $documento));
        } else {
            $query=$this->db->get('torcedores');
        }
		return $query->result_array();
	}
    
	function set_torcedores($dados)
	{
        $query= $this->db->get_where('torcedores', array('documento' => $dados['documento']));
        $result = $query->result_array();

        // Cadastra se não existir
        if(count($result) == 0) {
            $this->db->insert('torcedores', $dados);
        } else {                
            $this->db->set($dados);
            $this->db->where('documento', $dados['documento']);
            $this->db->update('torcedores');
        }
	}

}

?>