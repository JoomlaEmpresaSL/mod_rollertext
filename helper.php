<?php
/*
 *      Roller Text module
 *      @package Roller Text module
 *      @author José António Cidre Bardelás
 *      @copyright Copyright (C) 2011 José António Cidre Bardelás and Joomla Empresa. All rights reserved
 *      @license GNU/GPL v3 or later
 *      
 *      Contact us at info@joomlaempresa.com (http://www.joomlaempresa.es)
 *      
 *      This file is part of Roller Text module.
 *      
 *          Roller Text module is free software: you can redistribute it and/or modify
 *          it under the terms of the GNU General Public License as published by
 *          the Free Software Foundation, either version 3 of the License, or
 *          (at your option) any later version.
 *      
 *          Roller Text module is distributed in the hope that it will be useful,
 *          but WITHOUT ANY WARRANTY; without even the implied warranty of
 *          MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *          GNU General Public License for more details.
 *      
 *          You should have received a copy of the GNU General Public License
 *          along with Roller Text module.  If not, see <http://www.gnu.org/licenses/>.
 */

defined('_JEXEC') or die('Acesso restrito');

class modRollerTextHelper {
	function contidoArtigo($id) { 
		$db = &JFactory::getDBO();
		$artigo = "";
		$erro_no_artigo = 0;

		if($id > 0){
			$query  = "select * ";
			$query .= "FROM #__content  WHERE id =".$id." AND state=1 " ;
			$db->setQuery($query);
			if(!$artigo = $db->loadObject()) {
				$artigo = JText::_("NOM_EXISTE_ARTIGO");
				$erro_no_artigo = 1;
			}
		}
		else {
			$artigo = JText::_("NOM_EXISTE_ARTIGO");
			$erro_no_artigo = 1;
		}
		return(array($erro_no_artigo, $artigo));
	}
}
