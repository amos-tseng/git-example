<?php
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Debug\Debug;
use Board\BoardBundle\Entity\Board;
use Symfony\Component\HttpFoundation\Response;
/**
 * @var Composer\Autoload\ClassLoader $loader
 */
$loader = require_once __DIR__.'/app/bootstrap.php.cache';
//Debug::enable();
require_once __DIR__.'/app/AppKernel.php';

$Board = new Board();
$Board->setName('qwer');
$Board->setTitle('qwer2');
$Btimezone = new DateTimeZone('Asia/Taipei');
$Btime = new DateTime('now', $timezone);
$Board->setUpdateTime($time);
$Board->setMessage('mdfk');



$em = $this->getDoctrine()->getManager();
$em->persist($Board);
$em->flush();
