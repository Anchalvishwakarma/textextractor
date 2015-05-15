<?php
/**
 * Created by PhpStorm.
 * User: webonise
 * Date: 13/5/15
 * Time: 12:37 PM
 */

class Extractor extends ControllerTestCase {

    public function testIndex() {
        $result = $this->testAction('/extractor/index');
        debug($result);
    }
}