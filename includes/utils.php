<?php
        function getIfSet(&$value, $default = null)
        {
            return isset($value) ? $value : $default;
        }
?>