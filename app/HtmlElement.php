<?php
namespace App;

class HtmlElement
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var null
     */
    private $content;
    /**
     * @var array
     */
    private $attributes;
     public function __construct(string $name, array $attributes = [], $content = null)
    {
        $this->name = $name;
        $this->attributes = $attributes;
        $this->content = $content;
    }
    
    public function render()
    {
        $result = $this->open();
         // Si el elemento es void
        if ($this->isVoid()) {
            return $result;
        }
         // Imprimir el contenido
        $result .= $this->isRender();
        // Cerrar la etiqueta
        $result .= $this->close();
        return $result;
    }



    protected function open(){
         // Si el elemento tiene atributos:
        if (empty($this->attributes)) {
            // Abrir la etiqueta con atributos
            return $result = '<'.$this->name.'>';
        } 
        return $result = '<'.$this->name.$this->attributes().'>';
      
    }

    public function isVoid(){
        return in_array($this->name, ['br', 'hr', 'img', 'input', 'meta']);
    }

    protected function isRender(){
        return htmlentities($this->content, ENT_QUOTES, 'UTF-8');
    }

    protected function close(){
        return '</'.$this->name.'>';
    }

    protected function attributes(): string{
        $htmlAttributes = '';
        foreach ($this->attributes as $attribute => $value) {
            $htmlAttributes .= $this->getAtributes($attribute , $value);
        }
        return  $htmlAttributes;
    }

    protected function getAtributes($attribute , $value){
        $htmlAttributes = '';
        if (is_numeric($attribute)) {
           return $htmlAttributes .= ' '.$value;
        }

        return  $htmlAttributes .= ' '.$attribute.'="'.htmlentities($value, ENT_QUOTES, 'UTF-8').'"'; // name="value";
    }
} 