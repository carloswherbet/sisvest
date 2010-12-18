<?php

class myUser extends sfBasicSecurityUser
{


    public function getInstituicao() {

        $instituicao = $this->getAttribute('instituicao') ;

            if (!empty($instituicao)) {
                $instituicao  = Doctrine_Core::getTable('INSTITUICAO')->find(1);
                $this->getUser()->setAttribute('instituicao', $instituicao ->getNmInstituicao());
            }
    }


}
