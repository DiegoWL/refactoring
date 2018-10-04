<?php


namespace Tests;
use \App\HtmlElement;

class HtmlElementTest extends TestCase
{

    /** @test */
    public function genera_elemento_html()
    {
        $element = new HtmlElement('p', [], 'Este es el contenido');
        $this->assertSame('<p>Este es el contenido</p>', $element->render());
    }
    /** @test */
    public function genera_elemento_html_con_atributo()
    {
        $element = new HtmlElement('p', ['id' => 'paragraph'], 'Este es el contenido');
        $this->assertSame('<p id="paragraph">Este es el contenido</p>', $element->render());
    }

    /** @test */
    public function genera_elemento_html_con_atributo_id()
    {
        $element = new HtmlElement('p', ['id' => 'paragraph' , 'class' => 'clase'], 'Este es el contenido');
        $this->assertSame('<p id="paragraph" class="clase">Este es el contenido</p>', $element->render());
    }

     /** @test */
    function comprobar_Vacio(){
        $element = new HtmlElement('img', [], '');
        $this->assertTrue('<img></img>' ,   $element->isVoid());
    }


}
