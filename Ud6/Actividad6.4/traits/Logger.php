<?php
namespace traits;

trait Logger{

    public function log(string $msg): void
    {
        echo '<pre style="color:red">';
        echo date('Y-m-d h:i:s') . ':' .
            $msg . '<br/>';
        echo '</pre>';
    }

}