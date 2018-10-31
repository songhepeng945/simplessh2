<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2018/10/30
 * Time: 16:26
 */

namespace ssh2;


use ssh2\lib\SshConnect;

class Svn extends SshConnect
{
    public function SvnStatusPath($file)
    {
        $command = "svn info {$file}";
        $res = $this->Command($command);
        echo "<pre>";
        var_dump($res);
    }
}