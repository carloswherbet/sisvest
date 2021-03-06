<?php
// Connection Component Binding
Doctrine_Manager::getInstance()->bindComponent('VESTIBULAR', 'doctrine');

/**
 * BaseVESTIBULAR
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id_vestibular
 * @property string $te_periodo
 * @property string $te_horario
 * @property date $dt_vestibular
 * @property string $sg_situacao
 * @property string $sg_flag
 * @property Doctrine_Collection $VESTIBULARCURSO
 * 
 * @method integer             getIdVestibular()    Returns the current record's "id_vestibular" value
 * @method string              getTePeriodo()       Returns the current record's "te_periodo" value
 * @method string              getTeHorario()       Returns the current record's "te_horario" value
 * @method date                getDtVestibular()    Returns the current record's "dt_vestibular" value
 * @method string              getSgSituacao()      Returns the current record's "sg_situacao" value
 * @method string              getSgFlag()          Returns the current record's "sg_flag" value
 * @method Doctrine_Collection getVESTIBULARCURSO() Returns the current record's "VESTIBULARCURSO" collection
 * @method VESTIBULAR          setIdVestibular()    Sets the current record's "id_vestibular" value
 * @method VESTIBULAR          setTePeriodo()       Sets the current record's "te_periodo" value
 * @method VESTIBULAR          setTeHorario()       Sets the current record's "te_horario" value
 * @method VESTIBULAR          setDtVestibular()    Sets the current record's "dt_vestibular" value
 * @method VESTIBULAR          setSgSituacao()      Sets the current record's "sg_situacao" value
 * @method VESTIBULAR          setSgFlag()          Sets the current record's "sg_flag" value
 * @method VESTIBULAR          setVESTIBULARCURSO() Sets the current record's "VESTIBULARCURSO" collection
 * 
 * @package    ProjetoUnice
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseVESTIBULAR extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('VESTIBULAR');
        $this->hasColumn('id_vestibular', 'integer', 4, array(
             'type' => 'integer',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             'length' => 4,
             ));
        $this->hasColumn('te_periodo', 'string', 10, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             ));
        $this->hasColumn('te_horario', 'string', 10, array(
             'type' => 'string',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 10,
             ));
        $this->hasColumn('dt_vestibular', 'date', 25, array(
             'type' => 'date',
             'fixed' => 0,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             'length' => 25,
             ));
        $this->hasColumn('sg_situacao', 'string', 2, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 2,
             ));
        $this->hasColumn('sg_flag', 'string', 2, array(
             'type' => 'string',
             'fixed' => 1,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             'length' => 2,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('VESTIBULARCURSO', array(
             'local' => 'id_vestibular',
             'foreign' => 'id_vestibular'));
    }
}