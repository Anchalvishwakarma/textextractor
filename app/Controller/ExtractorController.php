<?php
/**
 * Created by PhpStorm.
 * User: webonise
 * Date: 13/5/15
 * Time: 1:03 PM
 */

class ExtractorController extends AppController
{

     public function index()
    {
        $path = APP . 'Vendor'. DS . str_replace('\\', DS,'Demo') . '.php';

        if (file_exists($path)) {
            $obj = new Demo();
            //$data = $obj->php_file_tree($_SERVER['DOCUMENT_ROOT'],"javascript:alert('You clicked on [link]')");
            $data = $obj->php_file_tree($_SERVER['DOCUMENT_ROOT'],"data-path='[link]'");

            $this->set('data', $data);
        }else {
          die('File Not Found Error:: Contact to Admin');
        }

    }
}