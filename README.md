FlexPress WordPress framework
===============

## Install

Install with composer:

```
composer create-project flexpress/framework
```

## Configuration

- You will then want to change your settings presumably for development first, so edit config/environments/development.php
- Make sure you keep the /wp on the site url otherwise you will get into a redirect loop.
- Setup your web server to point to the public_html folder.
- Visit that site and complete the WordPress install.
- All done.
