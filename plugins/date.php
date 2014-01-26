<?php

/******************************************************************************************* 
* Penulis     : Irfan Mahfudz Guntur                                                       * 
* Website     : BaseSystem Management http://bsmsite.com                                   *
* Email       : ayes@bsmsite.com                                                           *
* YM          : bsmsitecom                                                                 *
* (c) 2014 BaseSystem Management                                                           * 
*                                                                                          *
*            :: please.. don't remove this banner if you are "the real open-sourcer" ::    *
*                                                                                          *
********************************************************************************************/

function con2mysql($date) 
{
    $date = explode("/",$date);
    if ($date[0]<=9) { $date[0]=$date[0]; }
    if ($date[1]<=9) { $date[1]=$date[1]; }
    $date = array($date[2], $date[0], $date[1]);
    return $n_date=implode("-", $date);
}