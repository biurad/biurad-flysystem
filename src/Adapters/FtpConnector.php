<?php

declare(strict_types=1);

/*
 * This file is part of Biurad opensource projects.
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

namespace Biurad\FileManager\Adapters;

use Biurad\FileManager\Interfaces\FlyAdapterInterface;
use Closure;
use League\Flysystem\Adapter\Ftp as FtpAdapter;
use League\Flysystem\AdapterInterface;
use League\Flysystem\Config;

/**
 * This is the ftp connector class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 * @author Divine Niiquaye Ibok <divineibok@gmail.com>
 */
class FtpConnector implements FlyAdapterInterface
{
    /**
     * {@inheritdoc}
     *
     * @return FtpAdapter
     */
    public function connect(Config $config): AdapterInterface
    {
        static $connection;
        $connection = Closure::bind(
            static function (Config $item) {
                return $item->settings;
            },
            null,
            Config::class
        );

        return new FtpAdapter((array) $connection($config));
    }
}
