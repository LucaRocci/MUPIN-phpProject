<?php
namespace Utility\Test;

use PHPUnit\Framework\TestCase;
use Utility\ImgOperation;

class ImgOperationTest extends TestCase
{
    // test estrazione
    public function testEstractFalse(){
        $dir= "../Imm";
        $imgOp = new ImgOperation($dir);
        $img=[ 0 =>'Comp43534',
            1 => 'Comp989' ,
            2 =>'Compkkjk', 
            3 =>'Comp9819'];
        $this->assertFalse($imgOp->estract($img));
    }

    public function setUp() : void{
        $dir= __DIR__.'/ImmaginiTest';
        $this->imgOp = new ImgOperation($dir); 
    }

    public function testEstractTrue(){
       
        $img=[ 0 =>'Comp43534',
            1 => 'Comp989' ,
            2 =>'Compkkjk', 
            3 =>'Comp9819'];
        $this->assertIsArray($this->imgOp->estract($img));
    }

    public function testEstractNoImage(){
         $img=[];
         $this->assertFalse($this->imgOp->estract($img));
    }

    public function testCreateName(){
        $img='Comp989';
        $this->assertIsString($this->imgOp->createImageName($img));
    }

    public function testDeleteGood(){
        $img='Comp989_01.jpg'; 
        $this->assertTrue($this->imgOp->delete($img));
    }

    public function testDeleteFalse(){
        $img='Comp989_01'; 
        $this->assertFalse($this->imgOp->delete($img));
    }

    /*public function testInsert(){
        $img =[
        'immagini' => [
            'name' =>  'perifM02_01.jpg',
            'type' =>  'image/jpeg',
            'tmp_name' =>'C:\xampp\htdocs\esercizi\PHP-project\ProgettoFinale\test\perifM02_01.jpg',
            'error' =>  0,
            'size' =>  2139112]];
            $nome= 'Comp989_01';
        $this->assertTrue($this->imgOp->insert($img,$nome));
    }*/

    public function testInsertFailed(){
       $img= [];
        $nome= 'Comp989_01';
        $this->assertIsString($this->imgOp->insert($img,$nome));

    }

}