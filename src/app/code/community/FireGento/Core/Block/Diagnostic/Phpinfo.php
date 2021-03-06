<?php
/**                                                                       
 * This file is part of the FIREGENTO project.
 * 
 * FireGento_Core is free software; you can redistribute it and/or 
 * modify it under the terms of the GNU General Public License version 3 as 
 * published by the Free Software Foundation.
 * 
 * This script is distributed in the hope that it will be useful, but WITHOUT 
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS 
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 * 
 * PHP version 5
 *
 * @category  FireGento
 * @package   FireGento_Core
 * @author    FireGento Team <team@firegento.com>
 * @copyright 2011 FireGento Team (http://www.firegento.de). All rights served.
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 * @version   $Id:$
 */
/**
 * phpinfo()
 *
 * @category  FireGento
 * @package   FireGento_Core
 * @author    FireGento Team <team@firegento.com>
 * @copyright 2011 FireGento Team (http://www.firegento.de). All rights served.
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 * @version   $Id:$
 */
class FireGento_Core_Block_Diagnostic_Phpinfo
    extends Mage_Adminhtml_Block_Template
{
    /**
     * Displays the phpinfo in the current window..
     * 
     * @return void
     */
    public function getPhpInfo()
    {
        ob_start();
        phpinfo();
        preg_match ('%<style type="text/css">(.*?)</style>.*?(<body>.*</body>)%s', ob_get_clean(), $matches);
        echo "<div class='phpinfodisplay' style='overflow:hidden'><style type='text/css'>\n",
            join( "\n",
                array_map(
                    create_function(
                        '$i',
                        'return ".phpinfodisplay " . preg_replace( "/,/", ",.phpinfodisplay ", $i );'
                        ),
                    preg_split( '/\n/', $matches[1] )
                    )
                ),
            "</style>\n",
            $matches[2],
        "\n</div>\n";
    }
}