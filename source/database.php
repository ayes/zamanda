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

// database.php file ini digunakan untuk menangani koneksi dan query database

class kondb 
{
    // silahkan atur sesuai dengan akun database anda
    private 	$db_host        = "localhost";
    private 	$db_pengguna    = "";
    private 	$db_password    = "";
    private 	$db_namadb      = "";
    //------------------------------------------------
    
    private 	$query;
    private 	$hasil;
    protected 	$menghubungkan;
    var $dbprefix		= '';
    var $_reserved_identifiers	= array('*');
    var $_escape_char = '`';
    
    function __construct()
	{	
		$this->menghubungkan = mysqli_connect($this->db_host, $this->db_pengguna, $this->db_password);
                if (!$this->menghubungkan)
			{
				die("Kesalahan = ". mysqli_error());
			}
		mysqli_select_db($this->menghubungkan,$this->db_namadb);		
	}
   function query($query)
	{
		$this->query = $query;
		$this->hasil = mysqli_query($this->menghubungkan, $this->query) or die(mysql_error());			   
	}
   function data()
  	{
		if ($this->data = mysqli_fetch_array($this->hasil))    		
			return $this->data;
  		else
			return false;
	}
   function cek()
  	{
		if (mysqli_num_rows($this->hasil) > 0)    		
			return TRUE;
  		else
			return FALSE;
	}
   function insert($table = '', $data = NULL)
	{
		$jumlah_data = sizeof($data);
                $count = 1;
                $into = "";
		foreach ($data as $k => $v) 
			{
   				if ($jumlah_data == $count)
				{
					$into = $into.$k;
				}
				else
				{
					$into = $into.$k.",";
				}
				$count++;
			}
                $count = 1;
                $value = "";
		foreach ($data as $k => $v) 
			{
   				if ($jumlah_data == $count)
				{
					$value = $value."'".$v."'";
				}
				else
				{
					$value = $value."'".$v."',";
				}
				$count++;
			}
                 $this->query("INSERT INTO tbmahasiswa ($into) VALUES ($value)");       
	}
   function close()
  	{
    		if($this->menghubungkan)
    		{
      		$success = mysqli_close($this->menghubungkan);
      
      			if($success)
      			{
        			$this->db_host = null;
        			$this->db_pengguna = null;
        			$this->db_password = null;
        			$this->db_namadb = null;
        			$this->hubungkan = null;
      			}
      		return $success ? true : false;
    		}
    		else
    		{
      		trigger_error('tidak dapat menutup koneksi karena belum terhubung ke sebuah Server MySQL', E_USER_NOTICE);
      		return false;
    		}
  	}
}

/* End of file database.php */
/* Location: ./zamanda/database.php */