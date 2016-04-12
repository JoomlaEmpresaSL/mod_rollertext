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

jimport('joomla.form.formfield');

class JFormFieldColorpicker extends JFormField {
	//The field class must know its own type through the variable $type.
	protected $type = 'Colorpicker';
 
	public function getInput() {
        ob_start();
        $img = JUri::root()."modules/mod_rollertext/elements/images/rainbow.png";
        $imgx = JUri::root()."modules/mod_rollertext/elements/images/";
        static $embedded;
        if(!$embedded)
        {
            $css2 = JUri::root()."modules/mod_rollertext/elements/mooRainbow.css";
            //$jspath = JUri::root()."modules/mod_rollertext/elements/mooRainbow.js";
            $jspath = JUri::root()."modules/mod_rollertext/elements/".(version_compare(JVERSION, '3.0.0','ge')
							? "mooRainbow_1.4.js" : "mooRainbow.js");
             ?>
<link href="<?php echo $css2;?>" type="text/css" rel="stylesheet" />
<script src="<?php echo $jspath;?>"></script>
            <?php
            $embedded=true;
        ?>
<script>
            window.addEvent('domready',function(){
            $$(".marcodavelha").each(function(item){
                item.color=new MooRainbow(item.id, {
                    startColor: [58, 142, 246],
                    wheel: true,
                    id:item.id+'x',
                    deslocamentoX: -170,
                    onChange: function(color) {
					item.setStyle('background-color', color.hex);
                    item.getSiblings()[0].value = color.hex;
                    },
                    onComplete: function(color) {
                    item.getSiblings()[0].value = color.hex;
                    },
                    imgPath: '<?php echo $imgx;?>'
                });
                });
            });
            </script>
            <?php
        }
            ?>
    <input name="<?php echo $this->name;?>" type="text" class="inputbox" id="<?php echo  $this->id ?>" value="<?php echo $this->value;?>" size="10" /><img src="<?php echo $img; ?>" id="img<?php echo $this->id; ?>" alt="[M]" class="marcodavelha" width="16" height="16" title="<?php echo JText::_('ESCOLHE_COR') ?>" style="background-color: <?php echo $this->value;?>"/>
        <?php
        $content=ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
