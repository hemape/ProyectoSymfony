<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Producto;
use AppBundle\Form\ProductoType;
use AppBundle\Entity\Usuario;
use AppBundle\Form\UsuarioType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */

     public function indexAction(Request $request)
         {
             // replace this example code with whatever you need
             return $this->render('default/inicio.html.twig');
         }

         /**
          * @Route("/registro/", name="registro")
          */
    public function inicioAction(Request $request)
        {
           // replace this example code with whatever you need
            return $this->render('hector/registro.html.twig');

        }
        /**
         * @Route("/productos/", name="productos")
         */
    public function productosAction()
       {
         $repository = $this->getDoctrine()->getRepository('AppBundle:Producto');
         $values = $repository->findAll();
         return $this->render('Productos/all.html.twig', array("productos"=>$values));

       }



      /**
       * @Route("/usuarios/{id}", name="usuario")
       */
  public function usuariosidAction($id)
     {
       $repository = $this->getDoctrine()->getRepository('AppBundle:Usuario');
       $usuarioid = $repository->find($id);
       return $this->render('Usuarios/usuario.html.twig', array("id"=>$usuarioid->getId(),"NombreDeUsuario"=>$usuarioid->getUsername(),"Edad"=>$usuarioid->getEdad(),"Poblacion"=>$usuarioid->getPoblacion(),"Puntos"=>$usuarioid->getPuntos()));

     }


     /**
      * @Route("/productos/{id}", name="producto")
      */
 public function productosidAction($id)
    {
      $repository = $this->getDoctrine()->getRepository('AppBundle:Producto');
      $productoid = $repository->find($id);
      return $this->render('Productos/producto.html.twig', array("id"=>$productoid->getId(),"NombreProducto"=>$productoid->getNombreProducto(),"Precio"=>$productoid->getPrecio(),"Categoria"=>$productoid->getCategoria()));

    }
      /**
       * @Route("/nuevoProducto/", name="nuevoProducto")
       */
  public function nuevoProductoAction(Request $request)
     {
       $producto=new Producto();
       $form = $this->createForm(ProductoType::class, $producto);
       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
         $usuario = $form->getData();

         $entityManager = $this->getDoctrine()->getManager();
         $entityManager->persist($producto);
         $entityManager->flush();
         return $this->redirectToRoute('productos');
       }

       return $this->render('Productos/nuevoProducto.html.twig', array(
             'form' => $form->createView(),));

     }

     /**
      * @Route("/nuevoUsuario/", name="nuevoUsuario")
      */
 public function nuevoUsuarioAction(Request $request)
    {
      $usuario=new Usuario();
      $form = $this->createForm(UsuarioType::class, $usuario);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $usuario = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($usuario);
        $entityManager->flush();
        return $this->redirectToRoute('usuarios');
      }

      return $this->render('seguridad/nuevoUsuario.html.twig', array(
            'form' => $form->createView(),));

    }


     /**
      * @Route("/editarProducto/{id}", name="editarProducto")
      */
 public function EditarProductoAction(Request $request, $id)
    {
      $repository = $this->getDoctrine()->getRepository('AppBundle:Producto');
      $productoid = $repository->find($id);


      $form = $this->createForm(ProductoType::class, $productoid);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $productoid = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($productoid);
        $entityManager->flush();
        return $this->redirectToRoute('productos');
      }

      return $this->render('Productos/editarProducto.html.twig', array(
            'form' => $form->createView(),));

    }


    /**
     * @Route("/editarUsuario/{id}", name="editarUsuario")
     */
public function EditarUsuarioAction(Request $request, $id)
   {
     $repository = $this->getDoctrine()->getRepository('AppBundle:Usuario');
     $usuarioid = $repository->find($id);


     $form = $this->createForm(UsuarioType::class, $usuarioid);
     $form->handleRequest($request);

     if ($form->isSubmitted() && $form->isValid()) {
       $usuarioid = $form->getData();

       $entityManager = $this->getDoctrine()->getManager();
       $entityManager->persist($usuarioid);
       $entityManager->flush();
       return $this->redirectToRoute('usuarios');
     }

     return $this->render('Usuarios/editarUsuario.html.twig', array(
           'form' => $form->createView(),));

   }

   /**
   * @Route("/registro", name="registro")
   */
  public function registroAction(Request $request, UserPasswordEncoderInterface $passwordEncoder)
  {
    // 1) build the form
    $user = new Usuario();
    $form = $this->createForm(UsuarioType::class, $user);
    // 2) handle the submit (will only happen on POST)
    $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {
        // 3) Encode the password (you could also do this via Doctrine listener)
        $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
        $user->setPassword($password);
        // 4) save the User!
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        // ... do any other work - like sending them an email, etc
        // maybe set a "flash" success message for the user
        return $this->redirectToRoute('login');
    }
    return $this->render(
        'seguridad/nuevoUsuario.html.twig',
        array('form' => $form->createView())
    );
  }




}
