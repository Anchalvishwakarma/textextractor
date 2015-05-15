<?php
/**
 * Created by PhpStorm.
 * User: webonise
 * Date: 14/5/15
 * Time: 12:52 PM
 */
App::uses('Folder', 'Utility');
App::uses('File', 'Utility');

class GetresultsController extends AppController{


    public function index(){


       if (  $this->request->is('ajax') )
       {
             $this->autoRender = false;


             $fileWithpaths = $this->request->data('arrdata');
             $searchstring  = $this->request->data('searchdata');


             $Foundresults = array();

              foreach($fileWithpaths  as $path )
             {

                 if(is_file($path))
                 {

                     $data = fopen($path,'rb');
                     $line = 1;
                     $flag = 1;//for counting line number

                     while ($line = fgets($data)) {
                         if (preg_match('/'.$searchstring.'/i', $line))
                         {
                             $location_line_no = array('dir'=>$path,'lineno'=>$flag);
                         }
                         if(!empty($location_line_no))
                         {
                             array_push($Foundresults,$location_line_no);
                         }
                         unset($location_line_no);
                         $line++;
                         $flag++;
                     }
                 }
             }

               $filename=$searchstring."-".time().".pdf";//creating unique filename

              //send data to elements
              $this->set('data', $Foundresults);
              $this->set('serachtext',$searchstring);
              $this->set('filename',$filename);



              //for saving into file
              $str='';
              foreach($Foundresults as $val){
                  $str.="FILE LOCATION:-".$val['dir']."  LINE NUMBER:-".$val['lineno'].PHP_EOL;
              }


             /*
              * saving search result data to file
              */


               $this->layout = '/pdf/default';

               $this->render('/Pdf/my_pdf_view');

               $this->render('/Elements/result','ajax');


       }else{
           return $this->redirect(  array('controller' => 'Extractor', 'action' => '') );
       }
    }


    //for download

    public function sendFile($filename) {

        $this->response->file('file/pdf/'.$filename,array('download' => true, 'name' => 'foo'));
        // Return response object to prevent controller from trying to render
        // a view
        return $this->response;
    }
}