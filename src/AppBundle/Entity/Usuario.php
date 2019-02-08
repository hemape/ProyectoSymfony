<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;

    /**
     * Usuario
     *
     * @ORM\Table(name="usuario")
     * @ORM\Entity(repositoryClass="AppBundle\Repository\UsuarioRepository")
     */
    class Usuario implements UserInterface
    {
        /**
         * @var int
         *
         * @ORM\Column(name="id", type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        private $id;

        /**
         * @var string
         *
         * @ORM\Column(name="username", type="string", length=256)
         * @Assert\Length(
         *      min = 3,
         *      max = 25,
         *      minMessage = "El nombre tiene que tener {{ limit }} caracteres como minimo",
         *      maxMessage = "El nombre tiene que tener {{ limit }} caracteres como maximo"
         * )

         */
        private $username;

        /**
         * @var string
         *
         *  @ORM\Column(name="Password", type="string", length=256)
         * @Assert\Length(
         *      min = 6,
         *      max = 25,
         *      minMessage = "La contrasenya tiene que tener {{ limit }} caracteres como minimo",
         *      maxMessage = "La contraenya tiene que tener {{ limit }} caracteres como maximo"
         * )
         *
         */
        private $password;

        /**
         * @var int
         *
         * @ORM\Column(name="Edad", type="integer")
         * @Assert\Length(
         *      min = 1,
         *      max = 3,
         *      minMessage = "Edad tiene que tener {{ limit }} caracteres como minimo",
         *      maxMessage = "Edad tiene que tener {{ limit }} caracteres como maximo"
         * )
         *
         */
        private $edad;

        /**
         * @var string
         *
         * @ORM\Column(name="Poblacion", type="string", length=256)
         * @Assert\Length(
         *      min = 3,
         *      max = 25,
         *      minMessage = "La poblacion tiene que tener {{ limit }} caracteres como minimo",
         *      maxMessage = "La poblacion tiene que tener {{ limit }} caracteres como maximo"
         * )
         */
        private $poblacion;

        /**
         * @var int
         *
         * @ORM\Column(name="Puntos", type="integer")
         *
         * )

         */
        private $puntos;

        /**
           * @var array
           *
           * @ORM\Column(name="roles", type="json_array")
           */
          private $roles;

          private $plainPassword;

          public function __construct()
      {
          $this->roles = array('ROLE_USER');
      }

        /**
         * Get id
         *
         * @return int
         */
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set username
         *
         * @param string $username
         *
         * @return Usuario
         */
        public function setUsername($username)
        {
            $this->username = $username;

            return $this;
        }

        /**
         * Get username
         *
         * @return string
         */
        public function getUsername()
        {
            return $this->username;
        }

        /**
         * Set password
         *
         * @param string $password
         *
         * @return Usuario
         */
        public function setPassword($password)
        {
            $this->password = $password;

            return $this;
        }

        /**
         * Get password
         *
         * @return string
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * Set edad
         *
         * @param integer $edad
         *
         * @return Usuario
         */
        public function setEdad($edad)
        {
            $this->edad = $edad;

            return $this;
        }

        /**
         * Get edad
         *
         * @return int
         */
        public function getEdad()
        {
            return $this->edad;
        }

        /**
         * Set poblacion
         *
         * @param string $poblacion
         *
         * @return Usuario
         */
        public function setPoblacion($poblacion)
        {
            $this->poblacion = $poblacion;

            return $this;
        }

        /**
         * Get poblacion
         *
         * @return string
         */
        public function getPoblacion()
        {
            return $this->poblacion;
        }

        /**
         * Set puntos
         *
         * @param integer $puntos
         *
         * @return Usuario
         */
        public function setPuntos($puntos)
        {
            $this->puntos = $puntos;

            return $this;
        }

        /**
         * Get puntos
         *
         * @return int
         */
        public function getPuntos()
        {
            return $this->puntos;
        }

       /**
       * Set roles
       *
       * @param array $roles
       *
       * @return Usuario
       */
      public function setRoles($roles)
      {
          $this->roles = $roles;
          return $this;
      }
      /**
       * Get roles
       *
       * @return array
       */
      public function getRoles()
      {
          return $this->roles;
      }
      public function getPlainPassword()
      {
          return $this->plainPassword;
      }
      public function setPlainPassword($password)
      {
          $this->plainPassword = $password;
      }
      public function getSalt()
      {
          // The bcrypt and argon2i algorithms don't require a separate salt.
          // You may need a real salt if you choose a different encoder.
          return null;
      }
      public function eraseCredentials()
      {
      }


    }
