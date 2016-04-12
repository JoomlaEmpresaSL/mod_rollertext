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
?>
<!-- Roller Text Mod Begin -->
<!--[if IE]>
<style type="text/css">
#panel { margin-right: 1px; }
</style>
<![endif]-->

<style type="text/css">
.jspVerticalBar {
	<?php echo $posicom_rolagem; ?>: 0;
	background-color: #000;
}
</style>
<div id="contido" style="border: <?php echo $espessuraborda." ".$estiloborda." ".$corborda;  ?>; width: <?php echo $amplo; ?>px; height: <?php echo $alto; ?>px; background-image: url('<?php echo JURI::base().'media/images_rollertext/'.$imagem ?>'); display: block;">
<?php if($amostrar_texto) : ?>
<div id="panel" style="float: <?php echo $posicom_painel; ?>; width: 1%; height: <?php echo $alto; ?>px; filter:alpha(opacity=<?php echo $trans_painel*100 ?>); color: #FFF; background-color: <?php echo $corpainel; ?>; -moz-opacity:<?php echo $trans_painel ?>; -khtml-opacity: <?php echo $trans_painel ?>; opacity: <?php echo $trans_painel ?>; overflow: hidden;">
<div id="subcontido" style="height: <?php echo $alto_rec; ?>; margin: <?php echo $margsup.' '.$margdir.' '.$marginf.' '.$margesq; ?>;  overflow: auto; display: none;">

<div style="margin-<?php echo $posicom_rolagem; ?>: <?php echo $separa_texto; ?>;">
<?php echo (!$erro_no_artigo ? $artigo->introtext.$artigo->fulltext : $artigo); ?>
</div>
</div>
</div>
<?php endif; ?>
<?php if($ligacom) : ?>
<a href="<?php echo $ligacom; ?>" style="display: block; width: 100%; height: 100%; decoration-text: none; background-color: transparent;"<?php echo $alvo; ?>></a>
<?php endif; ?>
</div>
<!-- Roller Text Mod End -->
