Dev notes
=========

Testing the plugin
------------------

To test the plugin while developing crate a new `dummy-app` project at the same level.

```
Projects
├── defaults
│   └── ...
└── dummy-app
    └── composer.json
```

The content of `composer.json` is:

```json
{
    "name": "jawira/dummy-app",
    "require": {
        "jawira/defaults": "dev-master"
    },
    "repositories": [
        {
            "type": "path",
            "url": "/home/jawira/Projects/defaults"
        }
    ],
    "minimum-stability": "dev",
    "prefer-stable": true
}
```

Usually you will execute the following command to easily test the plugin.

```bash
rm -rf vendor composer.lock README.md; composer install
```

Source: [https://www.sitepoint.com/drunk-with-the-power-of-composer-plugins/]()

