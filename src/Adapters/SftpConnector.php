<?php

declare(strict_types=1);

/*
 * This file is part of BiuradPHP opensource projects.
 *
 * PHP version 7.1 and above required
 *
 * @author    Divine Niiquaye Ibok <divineibok@gmail.com>
 * @copyright 2019 Biurad Group (https://biurad.com/)
 * @license   https://opensource.org/licenses/BSD-3-Clause License
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BiuradPHP\FileManager\Adapters;

use BiuradPHP\FileManager\Interfaces\ConnectorInterface;
use League\Flysystem\Sftp\SftpAdapter;

/**
 * This is the sftp connector class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class SftpConnector implements ConnectorInterface
{
    /**
     * Establish an adapter connection.
     *
     * @param string[] $config
     *
     * @return SftpAdapter
     */
    public function connect(array $config)
    {
        return $this->getAdapter($config);
    }

    /**
     * Get the sftp adapter.
     *
     * @param string[] $config
     *
     * @return SftpAdapter
     */
    protected function getAdapter(array $config)
    {
        return new SftpAdapter($config);
    }
}
