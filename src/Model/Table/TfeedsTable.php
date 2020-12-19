<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Validation\Validator;
use Psr\Http\Message\UploadedFileInterface;

class TfeedsTable extends Table
{
    public function initialize(array $config): void
    {
        $this->setTable('tfeeds');
        $this->setPrimaryKey('id');
    }
    // public function validationDefault(Validator $validator): Validator
    // {
    //     $validator
    //         ->integer('id')
    //         ->allowEmptyString('id', null, 'create','image_file');

        

    //     $validator
    //         ->allowEmptyFile('image_file')
    //         ->add( 'image_file', [
    //         'mimeType' => [
    //             'rule' => [ 'mimeType', [ 'image/jpg', 'image/png', 'image/jpeg','video/mp4' ] ],
    //             'message' => 'Please upload mp4/jpg/png/jpeg',
    //         ],
    //         'fileSize' => [
    //             'rule' => [ 'fileSize', '<=', '2MB' ],
    //             'message' => 'Image file size must be less than 2MB.',
    //         ],
    //     ] )
    //         ->uploadedFile('image_file', [
                
    //             'minSize' => 1024, // Min 1 KB
                
    //         ])
    //         ->add('image_file', 'name', [
    //             'rule' => function (UploadedFileInterface $image_file) {
    //                 // filename must not be a path
    //                 $name = $image_file->getClientFilename();
    //                 if (strcmp(basename($name), $name) === 0) {
    //                     return true;
    //                 }
        
    //                 return false;
    //             }
    //         ]);
        
    //     return $validator;
    // }
   
}