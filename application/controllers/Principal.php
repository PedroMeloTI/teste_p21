<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
	
    public function __construct()
    {
        parent::__construct();
		$this->load->model('PrincipalModel', 'mp');

    }


	public function index()
	{
		$this->load->view('template/header');
		$this->load->view('principal');
		$this->load->view('template/footer');
	}
	
	
	public function importacao()
	{		
		error_reporting(0);


		if(isset($_POST['inp_mes'])) {
			$mesano =  $this->input->post('inp_mes');
			$file_xml = $_FILES['inp_file'];

			// pega mes e ano
			$exp_mesano = explode('/', $mesano);
			$mes = $exp_mesano[0];
			$ano = $exp_mesano[1];

			$xml = simplexml_load_file($file_xml['tmp_name']) or die('Não conseguiu abrir o arquivo');

			foreach ($xml->torcedor as $id => $dados) {
				
				$nome = (string)$dados['nome'][0];
				$documento = preg_replace("/[^0-9]/", "", (string)$dados['documento'][0]);
				$cep = preg_replace("/[^0-9]/", "", (string)$dados['cep'][0]);
				$endereco = (string)$dados['endereco'][0];
				$bairro = (string)$dados['bairro'][0];
				$cidade = (string)$dados['cidade'][0];
				$uf = (string)$dados['uf'][0];
				$telefone = preg_replace("/[^0-9]/", "", (string)$dados['telefone'][0]);
				$email = (string)$dados['email'][0];
				$ativo = (string)$dados['ativo'][0];

				$post = array(
					'nome' => $nome,
					'documento' => $documento,
					'cep' => $cep,
					'endereco' => $endereco,
					'bairro' => $bairro,
					'cidade' => $cidade,
					'uf' => $uf,
					'telefone' => $telefone,
					'email' => $email,
					'ativo' => $ativo,
					'mes_cadastro' => $mes,
					'ano_cadastro' => $ano
				);
				
				$result = $this->mp->set_torcedores($post);
				
				$_SESSION['msg_retorno'] = "Importado com sucesso!!!";
				$_SESSION['status'] = 'success';

			}

		}

		$res_torcedores = $this->mp->get_torcedores();
		$qtd_torcedores = count($res_torcedores);

		$dados['res_torcedores'] = $res_torcedores;
		$dados['qtd_torcedores'] = $qtd_torcedores;

		$this->load->view('template/header');
		
		$this->load->view('importacao', $dados);

		$this->load->view('template/footer');
	}

	// Cadastro manual de torcedores
	public function cadastro_manual(){

		$post = $this->input->post();

		$post['mes_cadastro'] = date('m');
		$post['ano_cadastro'] = date('Y');
		$post['ativo'] = 1;
		$post['cep'] = preg_replace("/[^0-9]/", "", $post['cep']);;
		$post['telefone'] = preg_replace("/[^0-9]/", "", $post['telefone']);
		
		$result = $this->mp->set_torcedores($post);
				
		$_SESSION['msg_retorno'] = "Cadastro realizado com sucesso!!!";
		$_SESSION['status'] = 'success';
		
		$res_torcedores = $this->mp->get_torcedores();
		$qtd_torcedores = count($res_torcedores);

		$url = base_url().'/principal/importacao';
		redirect($url);
	}

	// Busca dados via ajax
	public function get_dados(){

		$documento = $this->input->post('documento');

		$res_torcedores = $this->mp->get_torcedores($documento)[0];
		
		echo json_encode($res_torcedores);
	}

	public function enviar(){

		$mensagem = $this->input->post('mensagem');

		
		$res_torcedores = $this->mp->get_torcedores();
		$qtd_torcedores = count($res_torcedores);
		
		if(strlen($mensagem) > 0) {
			
			if($qtd_torcedores > 0 ){
				for($t = 0; $t < $qtd_torcedores; $t++){

					$config = Array(
						'protocol' => 'smtp',
						'smtp_host' => 'XXX',
						'smtp_port' => 465,
						'smtp_user' => 'XXX',
						'smtp_pass' => 'XXX',
						'mailtype'  => 'html', 
						'charset'   => 'iso-8859-1'
					);

					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					
					$email = $res_torcedores[$t]['email'];
			
					$this->email->from('XXX', 'Secretária - All Blacks');
					$this->email->to($email);
					$this->email->subject('Comunicado - All Blacks');
					$this->email->message($mensagem);
			
					$this->email->send();
				}
			}
		}
		
		$_SESSION['msg_retorno'] = "Comunicado enviado com sucesso!!!";
		$_SESSION['status'] = 'success';

		
		$this->load->view('template/header');
		
		$this->load->view('enviar');

		$this->load->view('template/footer');


	}

}
