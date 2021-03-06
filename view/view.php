<?php
/**
 * @author Łukasz Socha <kontakt@lukasz-socha.pl>
 * @version: 1.0
 * @license http://www.gnu.org/copyleft/lesser.html
 */

/**
 * This class includes methods for views.
 *
 * @abstract
 */
abstract class View
{

    /**
     * It loads the object with the model.
     *
     * @param string $name name class with the class
     * @param string $path pathway to the file with the class
     *
     * @return object
     */
    public function loadModel($name, $path = 'model/')
    {
        $path = $path . $name . '.php';
        $name = $name . '_model';
        try {
            if (is_file($path)) {
                require $path;
                $ob = new $name();
            } else {
                throw new Exception('Can not open model ' . $name . ' in: ' . $path);
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br />
                File: ' . $e->getFile() . '<br />
                Code line: ' . $e->getLine() . '<br />
                Trace: ' . $e->getTraceAsString();
            exit;
        }
        return $ob;
    }

    /**
     * It includes template file.
     *
     * @param string $name name template file
     * @param string $path pathway
     *
     * @return void
     */
    public function render($name, $path = 'templates/', $noIncludeHeaderFooter = false)
    {
        $headerPath = $path . 'header.html.php';
        $footerPath = $path . 'footer.html.php';
        $path = $path . $name . '.html.php';
        if ($noIncludeHeaderFooter) {
            $this->requireFile($name, $path);

        } else {
            $this->requireFile('header.html.php',$headerPath);
            $this->requireFile($name, $path);
            $this->requireFile('footer.html.php',$footerPath);
        }

    }

    private function requireFile($name, $path)
    {
        try {
            if (is_file($path)) {
                require $path;
            } else {
                throw new Exception('Can not open template ' . $name . ' in: ' . $path);
            }
        } catch (Exception $e) {
            echo $e->getMessage() . '<br />
                File: ' . $e->getFile() . '<br />
                Code line: ' . $e->getLine() . '<br />
                Trace: ' . $e->getTraceAsString();
            exit;
        }

    }

    /**
     * It sets data.
     *
     * @param string $name
     * @param mixed $value
     *
     * @return void
     */
    public function set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * It gets data.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->$name;
    }
}