<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Reservahotel', 'doctrine');

/**
 * BaseReservahotel
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $reh_codigo
 * @property integer $reh_hot_codigo
 * @property integer $reh_tra_codigo
 * @property date $reh_fecha_entrada
 * @property date $reh_fecha_salida
 * @property time $reh_hora_llegada
 * @property time $reh_hora_salida
 * @property string $reh_localizador
 * @property integer $reh_dias_estadia
 * @property integer $reh_noches_estadia
 * @property Tratamiento $Tratamiento
 * @property Hotel $Hotel
 * @property Doctrine_Collection $Logistica
 * 
 * @method integer             getRehCodigo()          Returns the current record's "reh_codigo" value
 * @method integer             getRehHotCodigo()       Returns the current record's "reh_hot_codigo" value
 * @method integer             getRehTraCodigo()       Returns the current record's "reh_tra_codigo" value
 * @method date                getRehFechaEntrada()    Returns the current record's "reh_fecha_entrada" value
 * @method date                getRehFechaSalida()     Returns the current record's "reh_fecha_salida" value
 * @method time                getRehHoraLlegada()     Returns the current record's "reh_hora_llegada" value
 * @method time                getRehHoraSalida()      Returns the current record's "reh_hora_salida" value
 * @method string              getRehLocalizador()     Returns the current record's "reh_localizador" value
 * @method integer             getRehDiasEstadia()     Returns the current record's "reh_dias_estadia" value
 * @method integer             getRehNochesEstadia()   Returns the current record's "reh_noches_estadia" value
 * @method Tratamiento         getTratamiento()        Returns the current record's "Tratamiento" value
 * @method Hotel               getHotel()              Returns the current record's "Hotel" value
 * @method Doctrine_Collection getLogistica()          Returns the current record's "Logistica" collection
 * @method Reservahotel        setRehCodigo()          Sets the current record's "reh_codigo" value
 * @method Reservahotel        setRehHotCodigo()       Sets the current record's "reh_hot_codigo" value
 * @method Reservahotel        setRehTraCodigo()       Sets the current record's "reh_tra_codigo" value
 * @method Reservahotel        setRehFechaEntrada()    Sets the current record's "reh_fecha_entrada" value
 * @method Reservahotel        setRehFechaSalida()     Sets the current record's "reh_fecha_salida" value
 * @method Reservahotel        setRehHoraLlegada()     Sets the current record's "reh_hora_llegada" value
 * @method Reservahotel        setRehHoraSalida()      Sets the current record's "reh_hora_salida" value
 * @method Reservahotel        setRehLocalizador()     Sets the current record's "reh_localizador" value
 * @method Reservahotel        setRehDiasEstadia()     Sets the current record's "reh_dias_estadia" value
 * @method Reservahotel        setRehNochesEstadia()   Sets the current record's "reh_noches_estadia" value
 * @method Reservahotel        setTratamiento()        Sets the current record's "Tratamiento" value
 * @method Reservahotel        setHotel()              Sets the current record's "Hotel" value
 * @method Reservahotel        setLogistica()          Sets the current record's "Logistica" collection
 * 
 * @package    pitetravel
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseReservahotel extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('reservahotel');
        $this->hasColumn('reh_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('reh_hot_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('reh_tra_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('reh_fecha_entrada', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('reh_fecha_salida', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('reh_hora_llegada', 'time', 25, array(
             'type' => 'time',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('reh_hora_salida', 'time', 25, array(
             'type' => 'time',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('reh_localizador', 'string', 80, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 80,
             ));
        $this->hasColumn('reh_dias_estadia', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
        $this->hasColumn('reh_noches_estadia', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 4,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Tratamiento', array(
             'local' => 'reh_tra_codigo',
             'foreign' => 'tra_codigo'));

        $this->hasOne('Hotel', array(
             'local' => 'reh_hot_codigo',
             'foreign' => 'hot_codigo'));

        $this->hasMany('Logistica', array(
             'local' => 'reh_codigo',
             'foreign' => 'log_reh_codigo'));
    }
}