<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductoController extends Controller
{
     public function indexAction(Request $request)
         {
             // replace this example code with whatever you need
             return $this->render('AppBundle:Productos:all.html.twig');
         }


}
