<?php

class Config 
{
    static $configData;

    public function __construct($configFilePath) {
        if (file_exists($configFilePath)) {
            $this->configData = require($configFilePath);
        } else {
            $this->configData = [];
        }
    }

    public function getConfigValue($key) {
        return $this->configData[$key] ?? null;
    }
}