<?php

namespace BookStack\App;

class PwaManifestBuilder
{
    public function build(): array
    {
        $darkMode = (bool) setting()->getForCurrentUser('dark-mode-enabled');
        $appName = setting('app-name');

        return [
            "name" => $appName,
            "short_name" => $appName,
            "start_url" => "./",
            "scope" => "/",
            "display" => "standalone",
            "background_color" => $darkMode ? '#111111' : '#F2F2F2',
            "description" => $appName,
            "theme_color" => ($darkMode ? setting('app-color-dark') : setting('app-color')),
            "launch_handler" => [
                "client_mode" => "focus-existing"
            ],
            "orientation" => "portrait",
            "icons" => [
                [
                    "src" => setting('app-icon-32') ?: url('/icon-32.png'),
                    "sizes" => "32x32",
                    "type" => "image/png"
                ],
                [
                    "src" => setting('app-icon-64') ?: url('/icon-64.png'),
                    "sizes" => "64x64",
                    "type" => "image/png"
                ],
                [
                    "src" => setting('app-icon-128') ?: url('/icon-128.png'),
                    "sizes" => "128x128",
                    "type" => "image/png"
                ],
                [
                    "src" => setting('app-icon-180') ?: url('/icon-180.png'),
                    "sizes" => "180x180",
                    "type" => "image/png"
                ],
                [
                    "src" => setting('app-icon') ?: url('/icon.png'),
                    "sizes" => "256x256",
                    "type" => "image/png"
                ],
                [
                    "src" => url('favicon.ico'),
                    "sizes" => "48x48",
                    "type" => "image/vnd.microsoft.icon"
                ],
            ],
        ];
    }
}
