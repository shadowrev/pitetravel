<?php

/**
 * Agencia
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    pitetravel
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7691 2011-02-04 15:43:29Z jwage $
 */
class Agencia extends BaseAgencia
{
    public function  __toString() {
        return $this->agn_nombre;
    }

    public function  getAgnDescripcionResumen()
    {
        if(strlen($this->agn_descripcion) > 15)
            return substr($this->agn_descripcion, 0, 15) . '...';
        else
            return $this->agn_descripcion;
    }
}
