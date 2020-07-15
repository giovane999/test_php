<?php 
error_reporting( E_ERROR | E_PARSE | E_CORE_ERROR | E_CORE_WARNING | E_COMPILE_ERROR | E_COMPILE_WARNING );
require_once 'config/autoload.php';

class Cliente
{
    public $id;
    public $nome;
    public $email;
    public $cpf;
    public $telefone;

    const MsgSuccess = "Cliente Cadastrado";
    const MsgVazio = "Preencha os campos para continuar";
    const MsgRemovidoSuccess = "Cliente Removido com sucesso!";
    const MsgAlterado = "Cliente Alterado com sucesso!";
    const MsgTelefoneInvalido = "Telefone inválido!";
    const MsgEmailInvalido = "E-mail inválido!";
    const MsgEmailExiste = "E-mail Já Existe!";
    const MsgCpfInvalido = "CPF inválido!";
    const MsgCpfExiste = "Cpf Já Existe!";
    const MsgRemovidoDanger = "<b>Relaxa a Mão ai Hackudão!</b></br>Destino não encontrado</br>Cadastre um novo cliente";

    // Cadastra Clientes
    public function cadastraCliente(Cliente $cliente)
    {
        // VERIFICA POST VAZIO 
        if(empty($_POST["nome"])  || empty($_POST["sobrenome"])  ||  empty($_POST["email"]) || empty($_POST["cpf"]))
        {    
            $msg =  $_SESSION['msg'] = "<div class='alertas-center'><p class='alert-danger col-md-6'>".Cliente::MsgVazio."</p></div>";
            echo $msg;       
        }
        else
        {   
            $cliente->nome = addslashes($_POST['nome']);
            $cliente->sobrenome = addslashes($_POST['sobrenome']);
            $cliente->email = addslashes(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
            $cliente->cpf = addslashes(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT));
            $cliente->telefone = addslashes(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT));

            $validaTelefone = Validacoes::validaTelefone($cliente); // Funcao validacao telefone
            $vaidaEmail = Validacoes::vaidaEmail($cliente); // Funcao validacao Email
            $vaidaExisteEmail = Validacoes::vaidaExisteEmail($cliente); // Funcao vaida Existe Email
            $vaidaCpf = Validacoes::vaidaCpf($cliente); // Funcao validacao Cpf
            $vaidaExisteCpf = Validacoes::vaidaExisteCpf($cliente); // Funcao validacao Cpf

            if ($validaTelefone === true & $vaidaEmail === true & $vaidaCpf === true & $vaidaExisteEmail === false & $vaidaExisteCpf === false){
                Models::Insert($cliente); // Model SQL para Inserir no banco (cadastrar)
                $msg =  $_SESSION['msg'] = "<div class='alertas-center'><p class='alert-success col-md-6'>".Cliente::MsgSuccess."</p></div>";
                echo $msg;
            }
        } // if VERIFICA POST VAZIO
    } // Fim Cadastra Clientes




    // Funcao lista clientes
    public function listaCliente(Cliente $cliente)
    {
        $res = Models::SelectAll($cliente); // Model SQL para selecionar Todos
        return $res;
    } // FIM Funcao lista clientes




    // Funcao remove clientes
    public function removerCliente(Cliente $cliente)
    {
        if (!empty($cliente->id) && is_numeric($cliente->id))
        {
           $res = Models::SelectId($cliente); // Model SQL para selecionar pelo id

            if( $res != NULL )
            { // Se retornar algum resultado

                Models::RemoveId($cliente); // Model SQL para REMOVER pelo id
                Redirect("../listar-clientes", "success", Cliente::MsgRemovidoSuccess,"1" );

            }else {
                require_once 'includes/hackudao.php';
                Redirect("../listar-clientes", "danger", Cliente::MsgRemovidoDanger, "3");
            }
        }else {
            require_once 'includes/hackudao.php';
            Redirect("../listar-clientes", "danger", Cliente::MsgRemovidoDanger, "3");
        }
    }  // Funcao remove clientes




    // Funcao formEditarCliente clientes
    public function formEditarCliente(Cliente $cliente)
    {
        if (!empty($cliente->id) && is_numeric($cliente->id))
        {
            $res = Models::SelectId($cliente);
            if( $res != NULL )
            { // Se retornar algum resultado

                $res = Models::SelectId($cliente); // Puxa clientes do db
                return $res;
            }else {
                require_once 'includes/hackudao.php';
                Redirect("../listar-clientes", "danger", Cliente::MsgRemovidoDanger, "3");
            }
        }else {
            require_once 'includes/hackudao.php';
            Redirect("../listar-clientes", "danger", Cliente::MsgRemovidoDanger, "3");
        }
    }  // Funcao formEditarCliente clientes




    // Funcao Edita clientes
    public function editarCliente(Cliente $cliente)
    {
        if (!empty($cliente->id) && is_numeric($cliente->id))
        {
            $res = Models::SelectId($cliente);
            if( $res != NULL )
            { // Se retornar algum resultado

                // VERIFICA POST VAZIO
                if(empty($_POST["nome"])  || empty($_POST["sobrenome"])  ||  empty($_POST["email"]) || empty($_POST["cpf"]))
                {
                    $msg =  $_SESSION['msg'] = "<div class='alertas-center'><p class='alert-danger col-md-6'>".Cliente::MsgVazio."</p></div>";
                    echo $msg;
                }
                else
                {
                    $cliente->nome = addslashes($_POST['nome']);
                    $cliente->sobrenome = addslashes($_POST['sobrenome']);
                    $cliente->email = addslashes(filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL));
                    $cliente->cpf = addslashes(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT));
                    $cliente->telefone = addslashes(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT));


                    $validaTelefone = Validacoes::validaTelefone($cliente); // Funcao validacao telefone
                    $vaidaEmail = Validacoes::vaidaEmail($cliente); // Funcao validacao Email
                    $vaidaCpf = Validacoes::vaidaCpf($cliente); // Funcao validacao  Cpf

                    if ($validaTelefone === true & $vaidaEmail === true & $vaidaCpf === true)
                    {
                        Models::Update($cliente);
                        Redirect("../listar-clientes", "success", Cliente::MsgAlterado , "1");
                    }
                }  // if VERIFICA POST VAZIO
            } // if Se retornar algum resultado
        }else {
            require_once 'includes/hackudao.php';
            Redirect("../listar-clientes", "danger", Cliente::MsgRemovidoDanger, "3");
        }
    } // Funcao Edita clientes


} // Fim classe cliente