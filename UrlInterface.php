<?php

interface UrlInterface
{
    public function getScheme();
    public function getHost();
    public function getQueryParams();
}