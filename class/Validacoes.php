<?php
require_once 'config/autoload.php';

class Validacoes
{

    public function vaidaEmail(Cliente $validacoes)
    {
        if(filter_var($validacoes->email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        $msg =  $_SESSION['msg'] = "<div class='alertas-center'><p class='alert-danger col-md-6'>".Cliente::MsgEmailInvalido."</p></div>";
        echo $msg;
        return false;
    }



    public function vaidaExisteEmail(Cliente $validacoes)
    {
        $res = Models::SelectEmail($validacoes); // Model SQL para verificar se existe pelo email
        if( $res != NULL )
        {
            $msg =  $_SESSION['msg'] = "<div class='alertas-center'><p class='alert-danger col-md-6'>".Cliente::MsgEmailExiste."</p></div>";
            echo $msg;
            return true;
        }
        return false;
    }


    public function vaidaExisteCpf(Cliente $validacoes)
    {
        $res = Models::SelectCpf($validacoes); // Model SQL para verificar se existe pelo email
        if( $res != NULL )
        {
            $msg =  $_SESSION['msg'] = "<div class='alertas-center'><p class='alert-danger col-md-6'>".Cliente::MsgCpfExiste."</p></div>";
            echo $msg;
            return true;
        }
        return false;
    }



    public function validaTelefone(Cliente $validacoes)
    {
        if(preg_match('^[0-9]{2,3}[0-9]{4}-[0-9]{4}$^', $validacoes->telefone)){
            return true;
        }
        $msg =  $_SESSION['msg'] = "<div class='alertas-center'><p class='alert-danger col-md-6'>".Cliente::MsgTelefoneInvalido."</p></div>";
        echo $msg;
        return false;
    }



    public function vaidaCpf(Cliente $validacoes)
    {
        $validacoes->cpf = str_replace(array('.','-','/'), "", $validacoes->cpf);
        $cpf = str_pad(preg_replace('[^0-9]', '', $validacoes->cpf), 11, '0', STR_PAD_LEFT);

        if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999'):
            $msg =  $_SESSION['msg'] = "<div class='alertas-center'><p class='alert-danger col-md-6'>".Cliente::MsgCpfInvalido."</p></div>";
            echo $msg;
            return false;
        else:
            for ($t = 9; $t < 11; $t++):
                for ($d = 0, $c = 0; $c < $t; $c++) :
                    $d += $cpf{$c} * (($t + 1) - $c);
                endfor;
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d):
                    $msg =  $_SESSION['msg'] = "<div class='alertas-center'><p class='alert-danger col-md-6'>".Cliente::MsgCpfInvalido."</p></div>";
                    echo $msg;
                    return false;
                endif;
            endfor;
            return true;
        endif;
    } // Saída CPF válido





} // Fim classe validacao
