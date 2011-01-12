<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Medico', 'doctrine');

/**
 * BaseMedico
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $med_codigo
 * @property integer $med_sfg_id
 * @property string $med_nombre
 * @property string $med_direccion
 * @property string $med_telefono1
 * @property string $med_telefono2
 * @property string $med_email
 * @property string $med_especialidad
 * @property Doctrine_Collection $Dietapaciente
 * @property Doctrine_Collection $Postoperatorio
 * @property Doctrine_Collection $Preoperatorio
 * 
 * @method integer             getMedCodigo()        Returns the current record's "med_codigo" value
 * @method integer             getMedSfgId()         Returns the current record's "med_sfg_id" value
 * @method string              getMedNombre()        Returns the current record's "med_nombre" value
 * @method string              getMedDireccion()     Returns the current record's "med_direccion" value
 * @method string              getMedTelefono1()     Returns the current record's "med_telefono1" value
 * @method string              getMedTelefono2()     Returns the current record's "med_telefono2" value
 * @method string              getMedEmail()         Returns the current record's "med_email" value
 * @method string              getMedEspecialidad()  Returns the current record's "med_especialidad" value
 * @method Doctrine_Collection getDietapaciente()    Returns the current record's "Dietapaciente" collection
 * @method Doctrine_Collection getPostoperatorio()   Returns the current record's "Postoperatorio" collection
 * @method Doctrine_Collection getPreoperatorio()    Returns the current record's "Preoperatorio" collection
 * @method Medico              setMedCodigo()        Sets the current record's "med_codigo" value
 * @method Medico              setMedSfgId()         Sets the current record's "med_sfg_id" value
 * @method Medico              setMedNombre()        Sets the current record's "med_nombre" value
 * @method Medico              setMedDireccion()     Sets the current record's "med_direccion" value
 * @method Medico              setMedTelefono1()     Sets the current record's "med_telefono1" value
 * @method Medico              setMedTelefono2()     Sets the current record's "med_telefono2" value
 * @method Medico              setMedEmail()         Sets the current record's "med_email" value
 * @method Medico              setMedEspecialidad()  Sets the current record's "med_especialidad" value
 * @method Medico              setDietapaciente()    Sets the current record's "Dietapaciente" collection
 * @method Medico              setPostoperatorio()   Sets the current record's "Postoperatorio" collection
 * @method Medico              setPreoperatorio()    Sets the current record's "Preoperatorio" collection
 * 
 * @package    pitetravel
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseMedico extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('medico');
        $this->hasColumn('med_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('med_sfg_id', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('med_nombre', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('med_direccion', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
        $this->hasColumn('med_telefono1', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('med_telefono2', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('med_email', 'string', 100, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 100,
             ));
        $this->hasColumn('med_especialidad', 'string', 50, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 50,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('Dietapaciente', array(
             'local' => 'med_codigo',
             'foreign' => 'dtp_med_codigo'));

        $this->hasMany('Postoperatorio', array(
             'local' => 'med_codigo',
             'foreign' => 'pos_med_codigo_responsable'));

        $this->hasMany('Preoperatorio', array(
             'local' => 'med_codigo',
             'foreign' => 'preo_med_codigo'));
    }
}