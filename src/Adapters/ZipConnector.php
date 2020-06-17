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
use InvalidArgumentException;
use League\Flysystem\ZipArchive\ZipArchiveAdapter;

/**
 * This is the zip connector class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class ZipConnector implements ConnectorInterface
{
    /**
     * Establish an adapter connection.
     *
     * @param string[] $config
     *
     * @return \League\Flysystem\ZipArchive\ZipArchiveAdapter
     */
    public function connect(array $config)
    {
        $config = $this->getConfig($config);

        return $this->getAdapter($config);
    }

    /**
     * Get the configuration.
     *
     * @param string[] $config
     *
     * @throws InvalidArgumentException
     *
     * @return string[]
     */
    protected function getConfig(array $config)
    {
        if (!\array_key_exists('path', $config)) {
            throw new InvalidArgumentException('The zip connector requires path configuration.');
        }

        return \array_intersect_key($config, \array_flip(['path']));
    }

    /**
     * Get the zip adapter.
     *
     * @param string[] $config
     *
     * @return ZipArchiveAdapter
     */
    protected function getAdapter(array $config)
    {
        return new ZipArchiveAdapter($config['path']);
    }
}
