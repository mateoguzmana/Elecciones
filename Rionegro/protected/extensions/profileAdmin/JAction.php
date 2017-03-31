<?php

class JAction {

    public function getActions($controller, $module = null) {
        if ($module != null) {
            $path = join(DIRECTORY_SEPARATOR, array(Yii::app()->modulePath, $module, 'controllers'));
        } else {
            $path = 'protected' . DIRECTORY_SEPARATOR . 'controllers';
        }

        if (!is_file($path . DIRECTORY_SEPARATOR . $controller . '.php')) {
            throw new Exception('No file found at ' . $path . DIRECTORY_SEPARATOR . $controller . '.php');
        }

        $actions = array();
        $file = fopen($path . DIRECTORY_SEPARATOR . $controller . '.php', 'r');
        $lineNumber = 0;
        while (feof($file) === false) {
            ++$lineNumber;
            $line = fgets($file);
            preg_match('/public[ \t]+function[ \t]+actionAjax([A-Z]{1}[a-zA-Z0-9]+)[ \t]*\(/', $line, $matches);
            if ($matches !== array()) {
                $name = $matches[1];
                $actions[] = $matches[1];
            }
        }
        return $actions;
    }

    public function diffActions($controller, $module = null, $queryAction) 
    {
        if ($module != null) {
            $path = join(DIRECTORY_SEPARATOR, array(Yii::app()->modulePath, $module, 'controllers'));
        } else {
            $path = 'protected' . DIRECTORY_SEPARATOR . 'controllers';
        }

        if (!is_file($path . DIRECTORY_SEPARATOR . $controller . '.php')) {
            throw new Exception('No file found at ' . $path . DIRECTORY_SEPARATOR . $controller . '.php');
        }

        $actions = array();
        $file = fopen($path . DIRECTORY_SEPARATOR . $controller . '.php', 'r');
        $lineNumber = 0;
        while (feof($file) === false)
        {
            ++$lineNumber;
            $line = fgets($file);
            preg_match('/public[ \t]+function[ \t]+action([A-Z]{1}[a-zA-Z0-9]+)[ \t]*\(/', $line, $matches);
            if ($matches !== array()) {
                $name = $matches[1];
                $actions[] = $matches[1];
            }
        }
        
        $differences = array();
        foreach ($actions as $ac)
        {
             $sw=0;
             $firstAction=strtolower($ac);
             foreach ($queryAction as $a)
             {
                 $secondAction=strtolower($a['Description']);
                 if($firstAction==$secondAction)
                 {
                     $sw=1;
                     break;
                 }
             }
             if($sw==0)
             {
                 array_push($differences, $firstAction);
             }
        }
        return $differences;
    }
}

