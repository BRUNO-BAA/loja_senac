<?php
    require_once('./conexao.php');
    
    ### manipulação dos dados de cidade na base ###
    
    # persistencia da cidade
    function fnAddCliente($nomeCliente, $logradouro, $numero, $bairro, $cep, $codCidade)
    {
        $link = getConnection();
        
        $query = "insert into cliente(nome_cli) values ('{$nomeCliente}')";
        $result = mysqli_query($link, $query);
        
        if($result)
        {
            $clienteID = mysqli_insert_id($link);
    
            $query = "insert into endereco(nm_lgr, nr_lgr, nm_bairro, nr_cep, cod_cli, cod_cidade); ";
            $query .= "values ('{$logradouro}', {$numero}, '{$bairro}', {$cep}, {$clienteID}, {$codCidade})";

            $result = mysqli_query($link, $query);
        }
        
        if($result)
        {
            return 'Cadastrado com sucesso';
        }

        mysqli_close($link);
        return 'Falha ao cadastrar';
    }

    function fnListClientes()
    {
        $link = getConnection();
        $query = "select * from consulta_cliente";

        $result = mysqli_query($link, $query);

        $clientes = array();
        while ($cliente = mysqli_fetch_assoc($result)) {
            array_push($clientes, $cliente);
        }

        return $clientes;
    }
