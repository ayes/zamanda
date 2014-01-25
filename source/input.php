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

class input 
    {
        function post($index = NULL, $xss_clean = FALSE)
        {
                if ($index === NULL AND ! empty($_POST))
                {
                        $post = array();

                        foreach (array_keys($_POST) as $key)
                        {
                                $post[$key] = $this->_fetch_from_array($_POST, $key, $xss_clean);
                        }
                        return $post;
                }

                return $this->_fetch_from_array($_POST, $index, $xss_clean);
        }
        function _fetch_from_array(&$array, $index = '', $xss_clean = FALSE)
        {
            if ( ! isset($array[$index]))
            {
                    return FALSE;
            }

            if ($xss_clean === TRUE)
            {
                    return $this->security->xss_clean($array[$index]);
            }

            return $array[$index];
        }
    }
    
/* End of file input.php */
/* Location: ./zamanda/input.php */