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

require_once(dirname(__FILE__).'/helper.php');

	$amplo_painel = (int) $params->get('amplo_painel', "33")."%";
	$trans_painel = $params->get('trans_painel', "0.7");
	$anim_painel = (int) $params->get('anim_painel', "800");
	$omeuscript = <<<REMATE
	var autopanel = jQuery.noConflict();
  	autopanel(document).ready(function(){\n
  	autopanel('#panel').animate({width:'$amplo_painel', opacity: $trans_painel}, $anim_painel, function() { autopanel('#subcontido').fadeIn('slow'); autopanel('#subcontido').jScrollPane({showArrows: true, horizontalGutter: 10}); });})\n
REMATE;

	$doc =& JFactory::getDocument();
	if($params->get('carregar_jquery', 1)) {
		$doc =& JFactory::getDocument();
		if(version_compare(JVERSION, '3.0.0','ge')){
			JHtml::_('jquery.framework');
		}else { $doc->addScript("http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"); }
	}
	$desenho = $params->get('sobreplanta', 'default');
	$doc->addStyleSheet(JURI::base()."modules/mod_rollertext/css/jquery.jscrollpane.css");
	$doc->addStyleSheet(JURI::base()."modules/mod_rollertext/css/jquery.jscrollpane.".$desenho.".css");
	$doc->addScript(JURI::base()."modules/mod_rollertext/js/jquery.mousewheel.js");
	$doc->addScript(JURI::base()."modules/mod_rollertext/js/jquery.jscrollpane.min.js");
	$doc->addScriptDeclaration($omeuscript);

$imagem = $params->get('imagem');
if(version_compare(JVERSION, '3.0.0','ge')){
	list($amplo, $alto) = getimagesize(JPATH_BASE.DIRECTORY_SEPARATOR.'media'.DIRECTORY_SEPARATOR.'images_rollertext'.DIRECTORY_SEPARATOR.$imagem);
}else{
	list($amplo, $alto) = getimagesize(JPATH_BASE.DS.'media'.DS.'images_rollertext'.DS.$imagem);
}
//$alto_rec = $alto - 100;
$alto_rec = (int) $params->get('alto_texto', '70')."%";
list($erro_no_artigo, $artigo) = modRollerTextHelper::contidoArtigo($params->get('id_artigo'));
$amostrar_texto = (int) $params->get('amostrar_texto', 1);
$margsup = (int) $params->get('margsup_texto', '50')."px";
//$marginf =  $params->get('marginf_texto', '50')."px";
$marginf = "50px";
$margesq = (int) $params->get('margesq_texto', '30')."px";
$margdir = (int) $params->get('margdir_texto', '10')."px";
$corborda = $params->get('cor_borda', '#000000');
$espessuraborda = (int) $params->get('espessura_borda', 1)."px";
$estiloborda = $params->get('estilo_borda', 'solid');
$corpainel = $params->get('cor_painel', '#000000');
$posicom_painel = $params->get('posicom_painel', 'right');
$posicom_rolagem = $params->get('posicom_rolagem', 'left');
$separa_texto = (int) $params->get('separa_texto', '15')."px";
$ligacom = $params->get('ligacom_externa');
$alvo = ($params->get('ligacom_externa_novapagina') ? ' target="_blank"' : '' );

$sobreplanta = JModuleHelper::getLayoutPath('mod_rollertext', $desenho);
if (file_exists($sobreplanta)) require($sobreplanta);
