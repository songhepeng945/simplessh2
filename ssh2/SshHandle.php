<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2018/10/30
 * Time: 20:18
 */

namespace ssh2;


use ssh2\lib\SshConnect;

class SshHandle extends SshConnect
{
    public function LsPath($file)
    {
        $command = "ls -l {$file}";
        $res = $this->Command($command);
        $data = $this->getFields($res, [
            'filename' => "8",
            "date"     => "5-6-7"
        ]);

        return $data;
    }
}