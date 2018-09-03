<?php

namespace ATW\ElementalGallery\Models;

use ATW\ElementalBase\Models\BaseElement;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\Assets\Image;
use Symbiote\GridFieldExtensions\GridFieldOrderableRows;

class ElementGallery extends BaseElement
{
    private static $icon = 'font-icon-block-content';

    private static $db = [
        'Text' => 'HTMLText'
    ];

    private static $has_many = [
        'Images' => GalleryImage::class
    ];

    private static $owns = [
        'Images'
    ];

    private static $table_name = 'ElementGallery';

    private static $singular_name = 'gallery element';

    private static $plural_name = 'gallery elements';

    private static $description = 'gallery element';

    public function getCMSFields()
    {
        $this->beforeUpdateCMSFields(function (FieldList $fields) {
//            $fields->addFieldToTab('Root.Main', $fields->fieldByName('Root.Images.Images'));
            if($imagesField = $fields->fieldByName('Root.Images.Images')) {
                $config = $imagesField->getConfig();
                $config->addComponent(new \Colymba\BulkUpload\BulkUploader());
                $config->getComponentByType('Colymba\BulkUpload\BulkUploader')
                    ->setUfSetup('setFolderName', 'gallery_images');
                $config->addComponent(new GridFieldOrderableRows('Sort'));
            }
        });
        return parent::getCMSFields();
    }

    public function getType()
    {
        return _t(__CLASS__ . '.BlockType', 'Gallery');
    }
}
