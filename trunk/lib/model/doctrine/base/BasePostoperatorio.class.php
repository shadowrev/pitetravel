<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Postoperatorio', 'doctrine');

/**
 * BasePostoperatorio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $pos_codigo
 * @property integer $pos_tra_codigo
 * @property integer $pos_med_codigo_responsable
 * @property time $pos_hora_cita_col
 * @property string $pos_valoracion
 * @property string $pos_recomendaciones
 * @property string $pos_tipo_anestesia
 * @property time $pos_hora_cirugia
 * @property integer $pos_enf_codigo
 * @property string $pos_info_especialista
 * @property string $pos_observaciones
 * @property Tratamiento $Tratamiento
 * @property Enfermera $Enfermera
 * @property Medico $Medico
 * @property Doctrine_Collection $Foto
 * 
 * @method integer             getPosCodigo()                  Returns the current record's "pos_codigo" value
 * @method integer             getPosTraCodigo()               Returns the current record's "pos_tra_codigo" value
 * @method integer             getPosMedCodigoResponsable()    Returns the current record's "pos_med_codigo_responsable" value
 * @method time                getPosHoraCitaCol()             Returns the current record's "pos_hora_cita_col" value
 * @method string              getPosValoracion()              Returns the current record's "pos_valoracion" value
 * @method string              getPosRecomendaciones()         Returns the current record's "pos_recomendaciones" value
 * @method string              getPosTipoAnestesia()           Returns the current record's "pos_tipo_anestesia" value
 * @method time                getPosHoraCirugia()             Returns the current record's "pos_hora_cirugia" value
 * @method integer             getPosEnfCodigo()               Returns the current record's "pos_enf_codigo" value
 * @method string              getPosInfoEspecialista()        Returns the current record's "pos_info_especialista" value
 * @method string              getPosObservaciones()           Returns the current record's "pos_observaciones" value
 * @method Tratamiento         getTratamiento()                Returns the current record's "Tratamiento" value
 * @method Enfermera           getEnfermera()                  Returns the current record's "Enfermera" value
 * @method Medico              getMedico()                     Returns the current record's "Medico" value
 * @method Doctrine_Collection getFoto()                       Returns the current record's "Foto" collection
 * @method Postoperatorio      setPosCodigo()                  Sets the current record's "pos_codigo" value
 * @method Postoperatorio      setPosTraCodigo()               Sets the current record's "pos_tra_codigo" value
 * @method Postoperatorio      setPosMedCodigoResponsable()    Sets the current record's "pos_med_codigo_responsable" value
 * @method Postoperatorio      setPosHoraCitaCol()             Sets the current record's "pos_hora_cita_col" value
 * @method Postoperatorio      setPosValoracion()              Sets the current record's "pos_valoracion" value
 * @method Postoperatorio      setPosRecomendaciones()         Sets the current record's "pos_recomendaciones" value
 * @method Postoperatorio      setPosTipoAnestesia()           Sets the current record's "pos_tipo_anestesia" value
 * @method Postoperatorio      setPosHoraCirugia()             Sets the current record's "pos_hora_cirugia" value
 * @method Postoperatorio      setPosEnfCodigo()               Sets the current record's "pos_enf_codigo" value
 * @method Postoperatorio      setPosInfoEspecialista()        Sets the current record's "pos_info_especialista" value
 * @method Postoperatorio      setPosObservaciones()           Sets the current record's "pos_observaciones" value
 * @method Postoperatorio      setTratamiento()                Sets the current record's "Tratamiento" value
 * @method Postoperatorio      setEnfermera()                  Sets the current record's "Enfermera" value
 * @method Postoperatorio      setMedico()                     Sets the current record's "Medico" value
 * @method Postoperatorio      setFoto()                       Sets the current record's "Foto" collection
 * 
 * @package    pitetravel
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePostoperatorio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('postoperatorio');
        $this->hasColumn('pos_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('pos_tra_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('pos_med_codigo_responsable', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('pos_hora_cita_col', 'time', 25, array(
             'type' => 'time',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('pos_valoracion', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('pos_recomendaciones', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('pos_tipo_anestesia', 'string', 20, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 20,
             ));
        $this->hasColumn('pos_hora_cirugia', 'time', 25, array(
             'type' => 'time',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('pos_enf_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('pos_info_especialista', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('pos_observaciones', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => '',
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Tratamiento', array(
             'local' => 'pos_tra_codigo',
             'foreign' => 'tra_codigo'));

        $this->hasOne('Enfermera', array(
             'local' => 'pos_enf_codigo',
             'foreign' => 'enf_codigo'));

        $this->hasOne('Medico', array(
             'local' => 'pos_med_codigo_responsable',
             'foreign' => 'med_codigo'));

        $this->hasMany('Foto', array(
             'local' => 'pos_codigo',
             'foreign' => 'pos_codigo'));
    }
}