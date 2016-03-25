<?php

class UtilsHelper extends Helper
{
    public function moeda_para_db($valor = null)
    {
        if (empty($valor)) {
            return 0;
        }

        return str_replace(array('.',','), array('','.'), $valor);
    }

    public function moeda_de_db($valor = null)
    {
        if (empty($valor)) {
            return 0;
        }

        return number_format($valor, 2, ',', '.');
    }

    public function getValor($valor = null) {
        if (empty($valor)) {
            return 0;
        }

        return str_replace(array(',','.'), array('',','), $valor);
    }

    public function itemValorTotal($qtde = null, $valor_unitario = null, $valor_total)
    {
        if (empty($qtde) || empty($valor_unitario) || empty($valor_total)) {
            return 'Valor inválido';
        }

        $valor_total_calculado = $qtde * $valor_unitario;

        if ($valor_total_calculado != $valor_total) {
            return "R$ {$this->moeda_de_db($valor_total)} <small style='color: red; text-decoration:line-through'>R$ {$this->moeda_de_db($valor_total_calculado)}</small>";
        }

        return "R$ " . $this->moeda_de_db($valor_total);
    }
}