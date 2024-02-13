<?php

class Error_model{

    public function handlerErrorBBDD($isQuery, $Error)
    {
        if (!$isQuery) {
            echo "<h3>Error con en " . $Error . "</h3>";
            return false;
        }
    }
}