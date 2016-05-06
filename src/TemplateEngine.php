<?php
/**
 * Created by PhpStorm.
 * User: ezyuskin
 * Date: 06.05.16
 * Time: 9:28
 */

namespace AmaxLab\Templates;

/**
 * http://stackoverflow.com/questions/5017582/php-looping-template-engine-from-scratch
 * Class TemplateEngine
 * @package AmaxLab\Templates
 */
class TemplateEngine
{
    /**
     * @var array
     */
    private $stack = [];

    /**
     * @var array
     */
    private $data = [];

    /**
     * @param string $template
     * @param array  $data
     * @return string
     */
    public function process($template, $data)
    {
        $this->data = $data;
        $this->stack = [];
        $template = str_replace('<', '<?php echo \'<\'; ?>', $template);
        $template = preg_replace('~\{(\w+)\}~', '<?php $this->showVariable(\'$1\'); ?>', $template);
        $template = preg_replace('~\{LOOP:(\w+)\}~', '<?php foreach ($this->data[\'$1\'] as $ELEMENT): $this->wrap($ELEMENT); ?>', $template);
        $template = preg_replace('~\{ENDLOOP:(\w+)\}~', '<?php $this->unwrap(); endforeach; ?>', $template);
        $template = '?>'.$template;

        return $this->run($template);
    }

    /**
     * @param string $name
     */
    private function showVariable($name)
    {
        if (isset($this->data[$name])) {
            echo $this->data[$name];
        } else {
            echo '';
        }
    }

    /**
     * @param array $element
     */
    private function wrap($element)
    {
        $this->stack[] = $this->data;

        foreach ($element as $k => $v) {
            $this->data[$k] = $v;
        }
    }

    /**
     * unwrap
     */
    private function unwrap()
    {
        $this->data = array_pop($this->stack);
    }

    /**
     * @return string
     */
    private function run()
    {
        ob_start();
        eval(func_get_arg(0));

        return ob_get_clean();
    }
}
