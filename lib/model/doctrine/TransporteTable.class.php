<?php

/**
 * TransporteTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class TransporteTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object TransporteTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Transporte');
    }

    public function obtenerTransportesActivos($datos_transporte = null)
    {
        $consulta = $this->createQuery();

        if(!empty($datos_transporte))
        {
            foreach($datos_transporte as $nombre_parametro => $valor_parametro)
            {
                if(is_numeric($valor_parametro))
                {
                    $consulta->where($parametro . ' = ' . $valor_parametro);
                }
                else
                {
                    $consulta->where($parametro . ' LIKE %' . $valor_parametro . '%');
                }
            }
        }

        return $consulta->execute();
    }
}