<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('Preoperatorio', 'doctrine');

/**
 * BasePreoperatorio
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $preo_codigo
 * @property integer $preo_tra_codigo
 * @property string $preo_glicemia
 * @property string $preo_tiempo_coagulacion
 * @property string $preo_tpt
 * @property string $preo_ptt
 * @property string $preo_creatinina
 * @property string $preo_nitrogeno_ureico
 * @property string $preo_parcial_orina
 * @property string $preo_electro
 * @property string $preo_rx_torax
 * @property string $preo_pa_lateral
 * @property string $preo_prueba_esfuerzo
 * @property string $preo_hg_glicosilada
 * @property string $preo_tsh
 * @property string $preo_t3
 * @property string $preo_t4
 * @property integer $preo_vih
 * @property date $preo_fecha_cita_ext
 * @property time $preo_hora_cita_ext
 * @property date $preo_fecha_cirugia
 * @property time $preo_hora_cirugia
 * @property integer $preo_cli_codigo
 * @property integer $preo_enf_codigo
 * @property string $preo_informe_especialista
 * @property string $preo_observaciones
 * @property integer $preo_med_codigo
 * @property Tratamiento $Tratamiento
 * @property Clinica $Clinica
 * @property Enfermera $Enfermera
 * @property Medico $Medico
 * @property Doctrine_Collection $Elementosxintervencion
 * @property Doctrine_Collection $Foto
 * 
 * @method integer             getPreoCodigo()                Returns the current record's "preo_codigo" value
 * @method integer             getPreoTraCodigo()             Returns the current record's "preo_tra_codigo" value
 * @method string              getPreoGlicemia()              Returns the current record's "preo_glicemia" value
 * @method string              getPreoTiempoCoagulacion()     Returns the current record's "preo_tiempo_coagulacion" value
 * @method string              getPreoTpt()                   Returns the current record's "preo_tpt" value
 * @method string              getPreoPtt()                   Returns the current record's "preo_ptt" value
 * @method string              getPreoCreatinina()            Returns the current record's "preo_creatinina" value
 * @method string              getPreoNitrogenoUreico()       Returns the current record's "preo_nitrogeno_ureico" value
 * @method string              getPreoParcialOrina()          Returns the current record's "preo_parcial_orina" value
 * @method string              getPreoElectro()               Returns the current record's "preo_electro" value
 * @method string              getPreoRxTorax()               Returns the current record's "preo_rx_torax" value
 * @method string              getPreoPaLateral()             Returns the current record's "preo_pa_lateral" value
 * @method string              getPreoPruebaEsfuerzo()        Returns the current record's "preo_prueba_esfuerzo" value
 * @method string              getPreoHgGlicosilada()         Returns the current record's "preo_hg_glicosilada" value
 * @method string              getPreoTsh()                   Returns the current record's "preo_tsh" value
 * @method string              getPreoT3()                    Returns the current record's "preo_t3" value
 * @method string              getPreoT4()                    Returns the current record's "preo_t4" value
 * @method integer             getPreoVih()                   Returns the current record's "preo_vih" value
 * @method date                getPreoFechaCitaExt()          Returns the current record's "preo_fecha_cita_ext" value
 * @method time                getPreoHoraCitaExt()           Returns the current record's "preo_hora_cita_ext" value
 * @method date                getPreoFechaCirugia()          Returns the current record's "preo_fecha_cirugia" value
 * @method time                getPreoHoraCirugia()           Returns the current record's "preo_hora_cirugia" value
 * @method integer             getPreoCliCodigo()             Returns the current record's "preo_cli_codigo" value
 * @method integer             getPreoEnfCodigo()             Returns the current record's "preo_enf_codigo" value
 * @method string              getPreoInformeEspecialista()   Returns the current record's "preo_informe_especialista" value
 * @method string              getPreoObservaciones()         Returns the current record's "preo_observaciones" value
 * @method integer             getPreoMedCodigo()             Returns the current record's "preo_med_codigo" value
 * @method Tratamiento         getTratamiento()               Returns the current record's "Tratamiento" value
 * @method Clinica             getClinica()                   Returns the current record's "Clinica" value
 * @method Enfermera           getEnfermera()                 Returns the current record's "Enfermera" value
 * @method Medico              getMedico()                    Returns the current record's "Medico" value
 * @method Doctrine_Collection getElementosxintervencion()    Returns the current record's "Elementosxintervencion" collection
 * @method Doctrine_Collection getFoto()                      Returns the current record's "Foto" collection
 * @method Preoperatorio       setPreoCodigo()                Sets the current record's "preo_codigo" value
 * @method Preoperatorio       setPreoTraCodigo()             Sets the current record's "preo_tra_codigo" value
 * @method Preoperatorio       setPreoGlicemia()              Sets the current record's "preo_glicemia" value
 * @method Preoperatorio       setPreoTiempoCoagulacion()     Sets the current record's "preo_tiempo_coagulacion" value
 * @method Preoperatorio       setPreoTpt()                   Sets the current record's "preo_tpt" value
 * @method Preoperatorio       setPreoPtt()                   Sets the current record's "preo_ptt" value
 * @method Preoperatorio       setPreoCreatinina()            Sets the current record's "preo_creatinina" value
 * @method Preoperatorio       setPreoNitrogenoUreico()       Sets the current record's "preo_nitrogeno_ureico" value
 * @method Preoperatorio       setPreoParcialOrina()          Sets the current record's "preo_parcial_orina" value
 * @method Preoperatorio       setPreoElectro()               Sets the current record's "preo_electro" value
 * @method Preoperatorio       setPreoRxTorax()               Sets the current record's "preo_rx_torax" value
 * @method Preoperatorio       setPreoPaLateral()             Sets the current record's "preo_pa_lateral" value
 * @method Preoperatorio       setPreoPruebaEsfuerzo()        Sets the current record's "preo_prueba_esfuerzo" value
 * @method Preoperatorio       setPreoHgGlicosilada()         Sets the current record's "preo_hg_glicosilada" value
 * @method Preoperatorio       setPreoTsh()                   Sets the current record's "preo_tsh" value
 * @method Preoperatorio       setPreoT3()                    Sets the current record's "preo_t3" value
 * @method Preoperatorio       setPreoT4()                    Sets the current record's "preo_t4" value
 * @method Preoperatorio       setPreoVih()                   Sets the current record's "preo_vih" value
 * @method Preoperatorio       setPreoFechaCitaExt()          Sets the current record's "preo_fecha_cita_ext" value
 * @method Preoperatorio       setPreoHoraCitaExt()           Sets the current record's "preo_hora_cita_ext" value
 * @method Preoperatorio       setPreoFechaCirugia()          Sets the current record's "preo_fecha_cirugia" value
 * @method Preoperatorio       setPreoHoraCirugia()           Sets the current record's "preo_hora_cirugia" value
 * @method Preoperatorio       setPreoCliCodigo()             Sets the current record's "preo_cli_codigo" value
 * @method Preoperatorio       setPreoEnfCodigo()             Sets the current record's "preo_enf_codigo" value
 * @method Preoperatorio       setPreoInformeEspecialista()   Sets the current record's "preo_informe_especialista" value
 * @method Preoperatorio       setPreoObservaciones()         Sets the current record's "preo_observaciones" value
 * @method Preoperatorio       setPreoMedCodigo()             Sets the current record's "preo_med_codigo" value
 * @method Preoperatorio       setTratamiento()               Sets the current record's "Tratamiento" value
 * @method Preoperatorio       setClinica()                   Sets the current record's "Clinica" value
 * @method Preoperatorio       setEnfermera()                 Sets the current record's "Enfermera" value
 * @method Preoperatorio       setMedico()                    Sets the current record's "Medico" value
 * @method Preoperatorio       setElementosxintervencion()    Sets the current record's "Elementosxintervencion" collection
 * @method Preoperatorio       setFoto()                      Sets the current record's "Foto" collection
 * 
 * @package    pitetravel
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePreoperatorio extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('preoperatorio');
        $this->hasColumn('preo_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 8,
             ));
        $this->hasColumn('preo_tra_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('preo_glicemia', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_tiempo_coagulacion', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_tpt', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_ptt', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_creatinina', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_nitrogeno_ureico', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_parcial_orina', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_electro', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_rx_torax', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_pa_lateral', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_prueba_esfuerzo', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_hg_glicosilada', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_tsh', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_t3', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_t4', 'string', 15, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'default' => 'no aplica',
             'notnull' => true,
             'autoincrement' => false,
             'length' => 15,
             ));
        $this->hasColumn('preo_vih', 'integer', 1, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 1,
             ));
        $this->hasColumn('preo_fecha_cita_ext', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('preo_hora_cita_ext', 'time', 25, array(
             'type' => 'time',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('preo_fecha_cirugia', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('preo_hora_cirugia', 'time', 25, array(
             'type' => 'time',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('preo_cli_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('preo_enf_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
        $this->hasColumn('preo_informe_especialista', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('preo_observaciones', 'string', null, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => '',
             ));
        $this->hasColumn('preo_med_codigo', 'integer', 8, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 8,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Tratamiento', array(
             'local' => 'preo_tra_codigo',
             'foreign' => 'tra_codigo'));

        $this->hasOne('Clinica', array(
             'local' => 'preo_cli_codigo',
             'foreign' => 'cli_codigo'));

        $this->hasOne('Enfermera', array(
             'local' => 'preo_enf_codigo',
             'foreign' => 'enf_codigo'));

        $this->hasOne('Medico', array(
             'local' => 'preo_med_codigo',
             'foreign' => 'med_codigo'));

        $this->hasMany('Elementosxintervencion', array(
             'local' => 'preo_codigo',
             'foreign' => 'exi_preo_codigo'));

        $this->hasMany('Foto', array(
             'local' => 'preo_codigo',
             'foreign' => 'fot_preo_codigo'));
    }
}