<?php

if (class_exists('Redis')) {
    echo 'Redis is installed';
} else {
    echo 'Redis is not installed';
}