<?php

namespace Atw\ElementalGallery\Extensions;

use SilverStripe\Core\Extension;
use SilverStripe\Control\Controller;

//Fix for BulkUpload
//https://github.com/colymba/GridFieldBulkEditingTools/issues/174#issuecomment-383898999

class VersionedGridFieldItemRequestExtension extends Extension {

    public function pushCurrent(){
        return null;
    }

}