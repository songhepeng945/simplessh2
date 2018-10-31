<?php
/**
 * Created by PhpStorm.
 * User: xxx
 * Date: 2018/10/30
 * Time: 16:14
 */

namespace ssh2\lib;


class SshConnect
{
    use SshConfig;
    use SshFormat;
    protected $connect;

    public function __construct($host, $port, $username, $password)
    {
        $this->setSshConfig($host, $port, $username, $password);
        $this->initSshConnect();
    }

    public function getConnect()
    {
        return $this->connect;
    }

    protected function initSshConnect()
    {
        if ( $this->connect == null ) {
            $config = $this->getSshConfig();
            $connect = ssh2_connect($config['host'], $config['port']);
            if ( ssh2_auth_password($connect, $config['username'], $config['password']) ) {
                $this->connect = $connect;
            } else {
                throw new \Exception("认证失败");
            }
        }
    }

    public function ResetSshConnect($host, $prot, $username, $password)
    {
        $this->connect = null;
        $this->setSshConfig($host, $prot, $username, $password);
        $this->initSshConnect();
    }

    protected function Command($command)
    {
        $connect = $this->getConnect();
        $stream = ssh2_exec($connect, $command);
        stream_set_blocking($stream, true);
        $tmp = [];
        while ($line = fgets($stream)) {
            $tmp[] = $line;
        }

        return $tmp;
    }
}