<?php
// APP Components
    function app_ddwdwdtext_input($type, $classname, $id, $name, $required = true ,$value)
    {
        $required_val = ($required) ? 'required = "required" ': '';
        $element = '<input type="'.$type.'" class="'.$classname.'" id="'.$id.'" name="'.$name.'"   value="'.$value.'"  />';
        return $element;
    }
    

    
    
  

  