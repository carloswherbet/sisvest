<?php

/**
 * curso actions.
 *
 * @package    ProjetoUnice
 * @subpackage login
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
  public function executeLogin(sfWebRequest $request)
  {
  	$login_admin = 'unice';
  	$login_admin_pass = 'unice';

  	$login_user = 'usuario';
  	$login_user_pass = 'usuario';
		if ($request->getParameter('login')) {

				if($request->getParameter('login') == $login_admin & $request->getParameter('senha') == $login_admin_pass ) {

						if (!$this->getUser()->isAuthenticated()) {
//							$this->getUser()->addCredential('admin');
                                                        $this->getUser()->setAttribute('permissao','admin');
				  			$this->getUser()->setAuthenticated(true);
				  			$this->redirect('vestibular');
						}

				} elseif ($request->getParameter('login') == $login_user & $request->getParameter('senha') == $login_user_pass ) {
						if (!$this->getUser()->isAuthenticated()) {
//							$this->getUser()->addCredential('user');
                                                        $this->getUser()->setAttribute('permissao','user');
				  			$this->getUser()->setAuthenticated(true);
				  			$this->redirect('inscricao');
						}
				} elseif ($request->getParameter('login') == "" || $request->getParameter('senha') == "" ) {
					$this->getUser()->setFlash('error','Autenticação Inválida');
				} else {
					$this->getUser()->setFlash('error','Autenticação Inválida');
				}


		}

  }
   public function executeSair(sfWebRequest $request) {
   		$this->getUser()->setAuthenticated(false);
                $this->getUser()->setAttribute('permissao',false);
   		$this->redirect('/web/login');


   }


}


