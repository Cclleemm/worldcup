<?php
/**
 * Controlleur permetant la gestion des matches
 *
 * PHP version 5.5
 *
 * @category   Controller
 * @package    worldcup\app\controllers
 * @author     Clément Hémidy <clement@hemidy.fr>, Fabien Côté <fabien.cote@me.com>
 * @copyright  2014 Clément Hémidy, Fabien Côté
 * @version    1.0
 * @since      0.1
 */


class TransactionController extends BaseController {


    /**
     * Renvoi toutes les transaction en JSON
     *
     * @return Response
     */
    public function index()
    {
        $user = User::getUserWithToken($_GET['token']);
        $transaction = new Transaction();
        $_GET['user_id'] = $user->id;

        return Response::json(
            array('success' => true,
                'payload' => $this->query_params($transaction)->toArray(),
            ));
    }

    /**
     * Renvoi une transaction
     *
     * @return Response
     */
    public function show($id)
    {

        $user = User::getUserWithToken($_GET['token']);

        return Response::json(
            array('success' => true,
                'payload' => Transaction::whereRaw('user_id = ? && id = ?', array($user->id), $id)->toArray(),
            ));
    }

}