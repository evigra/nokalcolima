<?php
	class general extends auxiliar
	{   
		##############################################################################	
		##  Metodos	
		##############################################################################		
		public function __CONSTRUCT()
		{	
			$files_available							=array("image/png","image/jpeg", "video/mp4");


			$this->words["path"]						=$_REQUEST["path"];			
			$this->words["events_opciones"]				="";
			$this->__FILES_DATA							=array();	
			
			$this->__MENU_SESSION();
		}

		##############################################################################		 		
		public function __BROWSE()
    	{
			$this->words["html_cargar_title"]		="";
			$this->words["html_cargar_description"]	="";

			$files_image				=array("png","jpeg","jpg");
			$files_video				=array("mp4");

			$return			="";
			$user_ids		="";
			$usuarios		=array();

			$where			="";
			if($_REQUEST["class"]!="Mapa")
				$where			=" AND type='{$_REQUEST["class"]}'";

			return $return;
		}		##############################################################################		 		
		public function __SAVE()
    	{
    	}    	
    	##############################################################################	   	
		public function __DELETE()
    	{
		}
    	##############################################################################	   	
		public function __EXECUTE($comando_sql, $option=array("open"=>1,"close"=>1))
    	{
    		if(is_string($option))
    		{
    			$option=array("open"=>1,"close"=>1);
    		}
    	
    		$return=array();    		    		
    		
    		if(@$this->sys_sql=="") 		$this->sys_sql=$comando_sql;
    		
	   		if(is_array($option))
    		{
				if(isset($option["echo"]))  
				{
		        	echo "<div class=\"echo\" style=\"display:none;\" title=\"{$option["echo"]}\">".$this->comando_sql."</div>";
		        }	
    			if(isset($option["open"]))	
    			{    			
    				$this->abrir_conexion();
    				if(isset($option["e_open"])  AND $this->sys_enviroments	=="DEVELOPER" AND @$this->sys_private["action"]!="print_pdf")
    					echo "<br><b>CONECCION ABIERTA</b><br>$comando_sql<br>{$option["e_open"]}";    				
    			}	
    		}

			$row=0;				
			if(is_object($this->OPHP_conexion)) 
			{
				$resultado	= @$this->OPHP_conexion->query($comando_sql);
				
				if(isset($this->OPHP_conexion->error)  AND $this->OPHP_conexion->error!="")
				{					
					echo "
						<div class=\"echo\" style=\"display:none;\" title=\"ERROR {$this->sys_object}\">
							{$this->OPHP_conexion->error}
							<br><br>
							$comando_sql
						</div>
					";
				}						
			}	
			else
			{
				$resultado=array();
				if(isset($option["echo"]) )
					echo "<div class=\"echo\" style=\"display:none;\" title=\"Coneccion\">Error en la conecion</div>";
			}	
						
			if(is_object(@$resultado)) 
			{			
				while($datos = $resultado->fetch_assoc())
				{							
					foreach($datos as $field =>$value)
					{
						if(is_string($field) AND !is_null($field))
						{
							#$value 					= html_entity_decode($value);
							$return[$row][$field]	=$value;
						}	
					}		
					$row++;	
				}
				$resultado->free();					
			}

			if(substr($comando_sql, 0, 6)=="INSERT")
				$return	=$this->OPHP_conexion->insert_id;
			
			#

			$this->__MESSAGE_EXECUTE="";
    		if(is_array($option))
    		{
    			if(isset($option["close"]))	
    			{
    				@$this->cerrar_conexion();
    				    if(isset($option["e_close"]) AND in_array($_SERVER["SERVER_NAME"],$_SESSION["var"]["server_error"]) AND @$this->sys_private["action"]!="print_pdf")
    					echo "<br><b>CONECCION CERRADA</b><br>{$option["e_close"]}";
    			}	
    		}
       		return $return;	
    	}    	   		
	}
?>