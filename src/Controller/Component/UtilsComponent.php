<?php

class UtilsComponent extends Component
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
}