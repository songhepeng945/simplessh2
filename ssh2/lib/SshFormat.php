<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2018/10/30
 * Time: 19:24
 */

namespace ssh2\lib;


trait SshFormat
{
    protected $options;

    public function getFields($data, array $option)
    {
        $tmp = [];
        foreach ($option as $field => $string) {
            $indexs = explode("-", $string);
            $tmp[$field] = $indexs;
        }
        $this->options = $tmp;
        array_walk($data, [ $this, "Format" ]);

        return array_values(array_filter($data));
    }

    protected function Format(&$value)
    {
        $tmp = [];
        $data = array_values(array_filter(explode(" ", $value)));
        foreach ($this->options as $field => $index_list) {
            try {
                $str = "";
                foreach ($index_list as $index) {
                    $str .= $data[$index] . " ";
                }
            } catch (\Exception $e) {
                //不符合条件则跳过
                continue;
            }
            $tmp[$field] = trim($str);
        }
        $value = $tmp;
    }
}