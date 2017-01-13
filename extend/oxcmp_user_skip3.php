<?php

/**
 * ___MODULE___
 * Copyright (C) ___YEAR___  ___COMPANY___
 * info:  ___EMAIL___
 *
 * This program is free software;
 * you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation;
 * either version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
 * without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * You should have received a copy of the GNU General Public License along with this program; if not, see <http://www.gnu.org/licenses/>
 *
 * author: ___AUTHOR___
 */

class oxcmp_user_skip3 extends oxcmp_user_skip3_parent
{
    public function changeuser()
    {
        $ret = parent::changeUser();
        if($ret !== "payment" ) return $ret;

        $cfg = oxRegistry::getConfig();
        $oSession = oxRegistry::getSession();

        $sShipSetId = $cfg->getConfigParam("skip3shipsetid");
        $sPaymentId = $cfg->getConfigParam("skip3paymentid");

        $oSession->setVariable('paymentid', $sPaymentId);
        $oSession->deleteVariable('stsprotection');

        $oBasket = $oSession->getBasket();
        $oBasket->setPayment(null);
        $oBasket->setTsProductId(null);
        $oBasket->setShipping($sShipSetId);

        return "order";
    }

}
