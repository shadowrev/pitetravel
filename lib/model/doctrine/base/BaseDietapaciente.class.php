<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Dietapaciente', 'doctrine');

/**
 * BaseDietapaciente
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $dtp_codigo
 * @property integer $dtp_tra_codigo
 * @property string $dtp_recomendaciones
 * @property integer $dtp_med_codigo
 * @property string $dtp_tipo_dieta
 * @property Tratamiento $Tratamiento
 * @property Medico $Medico
 * @property Doctrine_Collection $Menu
 * 
 * @method integer             getDtpCodigo()           Returns the current record's "dtp_codigo" value
 * @method integer             getDtpTraCodigo()        Returns the current record's "dtp_tra_codigo" value
 * @method string              getDtpRecomendaciones()  Returns the current record's "dtp_recomendaciones" value
 * @method integer             getDtpMedCodigo()        Returns the current record's "dtp_med_codigo" value
 * @method string              getDtpTipoDieta()        Returns the current record's "dtp_tipo_dieta" value
 * @method Tratamiento         getTratamiento()         Returns the current record's "Tratamiento" value
 * @method Medico              getMedico()              Returns the current record's "Medico" value
 * @method Doctrine_Collection getMenu()                Returns the current record's "Menu" collection
 * @method Dietapaciente       setDtpCodigo()           Sets the current record's "dtp_codigo" value
 * @method Dietapaciente       setDtpTraCodigo()        Sets the current record's "dtp_tra_codigo" value
 * @method Dietapaciente       setDtpRecomendaciones()  Sets the current record's "dtp_recomendaciones" value
 * @method Dietapaciente       setDtpMedCodigo()        Sets the current record's "dtp_med_codigo" value
 * @method Dietapaciente       setDtpTipoDieta()        Sets the current record's "dtp_tipo_dieta" value
 * @method Dietapaciente       setTratamiento()         Sets the current record's "Tratamiento" value
 * @method Dietapaciente       setMedico()              Sets the current record's "Medico" value
 * @method Dietapaciente       setMenu()                Sets the current record's "Menu" collection
 * 
 * @package    pitetravel
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseDietapaciente extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('dietapaciente');
        $this->hasColumn('dtp_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('dtp_tra_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('dtp_recomendaciones', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('dtp_med_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('dtp_tipo_dieta', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'PREOPERATORIA',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Tratamiento', array(
             'local' => 'dtp_tra_codigo',
             'foreign' => 'tra_codigo'));

        $this->hasOne('Medico', array(
             'local' => 'dtp_med_codigo',
             'foreign' => 'med_codigo'));

        $this->hasMany('Menu', array(
             'local' => 'dtp_codigo',
             'foreign' => 'men_dtp_codigo'));
    }
}