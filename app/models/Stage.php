<?php
/**
 * Modèle de donnée des étapes de la compétition
 *
 * PHP version 5.5
 *
 * @category   Modèles
 * @package    worldcup\app\models
 * @author     Clément Hémidy <clement@hemidy.fr>, Fabien Côté <fabien.cote@me.com>
 * @copyright  2014 Clément Hémidy, Fabien Côté
 * @version    0.1
 * @since      0.1
 */

class Stage extends Eloquent {

    /**
     * Table corespondant sur le SGBD
     *
     * @var string
     */
    protected $table = 'stage';

    public $timestamps = false;

    /**
     * Récupère l'objet Stage suivant
     *
     * @var Stage
     */
    public function next_stage()
    {
        return $this->belongsTo('Stage', 'next_stage', 'id');
    }

    /**
     * Table corespondant au champ caché sur les retours JSON
     *
     * @var array
     */
    protected $hidden = array('created_at', 'updated_at');

    /**
     * Définition des règles de vérifications pour les entrées utilisateurs et le non retour des erreur mysql
     *
     * @var array
     */
    public static $rules = array(
        'name' => 'required|alpha_num|max:255',
        /*'next_stage' => 'exists:stage,id',*/
    );
}