<?php
namespace ATW\ElementalGallery\Models;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;

class GalleryImage extends DataObject {

    private static $db = [
        "Title" => "Varchar(255)",
        "Sort" => "Int"
    ];

    private static $has_one = [
        "Parent" => ElementGallery::class,
        "Image" => Image::class
    ];

    private static $owns = [
        'Image'
    ];

    private static $summary_fields = [
        "CMSThumb",
        "Title"
    ];

    private static $table_name = 'ElementGallery_Image';

    private static $singular_name = 'gallery image';

    private static $plural_name = 'gallery images';

    private static $description = 'gallery image';

    public function CMSThumb() {
        if($image = $this->Image())
            return $image->Pad(100,100);
    }

}