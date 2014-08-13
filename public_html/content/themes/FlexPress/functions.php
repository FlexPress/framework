<?php

use FlexPress\Theme\DependencyInjection\DependencyInjectionContainer;

// Dependency Injection
$dic = new DependencyInjectionContainer();
$dic->init();

// Run app
$dic['FlexPress']->init(__DIR__);
