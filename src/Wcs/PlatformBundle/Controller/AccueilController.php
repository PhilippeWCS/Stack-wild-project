<?php
/**
 * Created by PhpStorm.
 * User: wilder
 * Date: 04/04/17
 * Time: 10:05
 */

namespace Wcs\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AccueilController extends Controller
{
    public function indexAction()
    {
        return $this->render('WcsPlatformBundle:Default:index.html.twig');
    }
}