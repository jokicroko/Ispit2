<?php

class Config 
{
    private $configData;

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