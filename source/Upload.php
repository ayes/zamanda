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

class Upload { 

     
    var $fieldname; 
    var $type; 
    var $upload_dir; 
    var $filename; 
    public $nama_file; 
     
    function __construct($n_fieldname, $n_upload_dir){ 
     
        $this->fieldname = $n_fieldname; 
        //$this->type = $n_type; 
        $this->upload_dir = $n_upload_dir; 
        //$this->filename = $n_filename; 
        $this->uploaded();     
     
    } 
     
     
     
    function uploaded(){ 
     
       
     
            if( $_FILES[$this->fieldname]["error"] == 0){ 
                
                $this->nama_file = $_FILES[$this->fieldname]["name"]; 
                $_FILES[$this->fieldname]["type"]; 
                //(($_FILES[$this->fieldname]["size"] / 9024)/9024); 
                $_FILES[$this->fieldname]["tmp_name"]; 
                 move_uploaded_file( $_FILES[$this->fieldname]["tmp_name"], $this->upload_dir . $_FILES[$this->fieldname]["name"]);
//                if(move_uploaded_file( $_FILES[$this->fieldname]["tmp_name"], $this->upload_dir . $_FILES[$this->fieldname]["name"])){ 
//                 
//                    return TRUE; 
//                 
//                } 
//                 
            } else { 
             
                //$_FILES[$this->fieldname]["error"]; 
               return FALSE;
            
           } 
             
        
     
    } 
     

} 