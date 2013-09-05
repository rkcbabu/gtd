<?php
// initializing or creating array
$student_info = array(your array data);

// creating object of SimpleXMLElement
$xml_student_info = new SimpleXMLElement("<?xml version=\"1.0\"?><student_info></student_info>");

// function call to convert array to xml
array_to_xml($student_info,$xml_student_info);

//saving generated xml file
$xml_student_info->asXML('file path and name');


// Function defination to convert array to xml
function array_to_xml($student_info, &$xml_student_info) {
    foreach($student_info as $key => $value) {
        if(is_array($value)) {
            if(!is_numeric($key)){
                $subnode = $xml_student_info->addChild("$key");
                array_to_xml($value, $subnode);
            }
            else{
                $subnode = $xml_student_info->addChild("item$key");
                array_to_xml($value, $subnode);
            }
        }
        else {
            $xml_student_info->addChild("$key","$value");
        }
    }
}
// This is added to BranchV2 code for depth-1 clone push check ; 
?>