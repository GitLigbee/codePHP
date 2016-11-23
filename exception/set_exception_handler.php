<?php
function customException($exception){
    echo $exception->getMessage();
}

set_exception_handler('customException');

throw new Exception('the custom exception');
