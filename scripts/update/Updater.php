<?php
/**
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; under version 2
 * of the License (non-upgradable).
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 *
 * Copyright (c) 2014 (original work) Open Assessment Technologies SA;
 *
 *
 */

namespace oat\taoDeliverySchedule\scripts\update;

use common_ext_ExtensionsManager;
use tao_helpers_data_GenerisAdapterRdf;
use common_Logger;

/**
 * 
 * @author Aleh Hutnikau <hutnikau@1pt.com>
 */
class Updater extends \common_ext_ExtensionUpdater {
    
    /**
     * 
     * @param string $initialVersion
     * @return string $versionUpdatedTo
     */
    public function update($initialVersion) {
        
        $currentVersion = $initialVersion;
        //$extensionManager = common_ext_ExtensionsManager::singleton();
        
        if ($currentVersion == '0.1') {
            $file = dirname(__FILE__).DIRECTORY_SEPARATOR.'model_0_1_1.rdf';
            
            $adapter = new tao_helpers_data_GenerisAdapterRdf();
            
            if ($adapter->import($file)) {
                $currentVersion = '0.1.1';
            } else{
                common_Logger::w('Import failed for '.$file);
            }
        }
        
        return $currentVersion;
    }
}
