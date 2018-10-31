<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2018/10/30
 * Time: 17:28
 */

namespace ssh2\lib;


trait SshConfig
{
    protected $host;
    protected $port;
    protected $username;
    protected $password;

    public function getSshConfig()
    {
        return [
            'host'     => $this->host,
            "port"     => $this->port,
            'username' => $this->username,
            "password" => $this->password
        ];
    }

    public function setSshConfig($host, $port, $username, $password)
    {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
    }
}