<?php 
    /*clases objetos
    class Persona{ //Definimos una clase con el nombre de persona 
        //Atributos
        public $nombre = "pedro";

        //Metodos
        //los parametros van dentro de los parentesis
        public function hablar($mensaje){ //Definimos un metodo con el nombre hablar
            echo $mensaje;
        }
    } 
    $persona = new Persona();//instanciamos la clase persona y la asignamos a una nueva variable. Se creo un nuevo objeto
    echo $persona->nombre;//extraemos el nombre de la persona 
    $persona->hablar("Hola, Buenos días");//llamado a un metodo con un parametro e ingresando un mensaje al parametro
    */
?>

<?php 
/*metodos atributos
//Tenemos una escuela donde registraremos nombre y apellido de cada persona
//usaremos 2 atributos que son su nombre y apellido y 2 metodos que son guardar y mostrar
//$this palabra reservada para hacer referencia a un atributo o aun metodo
//self:: palabra reservada para hacer referencia a un metodo  
    class Persona{
        //atributos 
        public $nombre = array(); //creamos un array
        public $apellido = array();

        //metodos
        //pasamos los atributos como argumentos en la funcion guardar
        public function guardar($nombre, $apellido){ 
            $this->nombre[] = $nombre;//hacemos referencia de los atributos con la plabra $this
            $this->apellido[] = $apellido;
        }

        public function mostrar(){
            for ($i=0; $i < count($this->nombre); $i++) { 
                self::formato($this->nombre[$i], $this->apellido[$i]);//hacemos referencia o llamado de un metodo dentro de otro
                //$this->formato($this->nombre[$i], $this->apellido[$i]);//hacemos referencia o llamado de un metodo dentro de otro

            }
        }
        public function formato($nombre, $apellido){
            echo "Nombre ".$nombre." Apellido ". $apellido."<br>";
        }
    }
    //objeto de la clase 
    $persona = new Persona();
    //llamamos al metodo guaradar y asignamos el nombre y apellido;
    $persona->guardar("pedro","hernandez");
    $persona->guardar("jose","garcia");
    //llamamos al metodo mostrar para ver los datos
    $persona->mostrar();
    */
?>

<?php 

    /*__construct
        Al instaciar la clase el método se ejecuta al comienzo de manera automatica.
        debe ser publico 
        no debe retornar nada
    __destruct
        Este método támbien se ejecuta de manera automatica pero al final de la clase.
        debe ser publico 
        no debe retornar nada
    */
    /*EJEMPLO
        Aplicacion tipo loteria donde le indicaremos un numero aleatorio y la cantidad de intentos, esta debe mostrar los intentos
        y al final debe mostrar un mensaje si gano o no el concursante
    */
    /*
    class Loteria{
        //atributos 
        public $numero;
        public $intentos;
        public $resultado = false;
        
        //metodos
        //creamos el metodo constructor y pasamos como parametros los atributos
        public function __construct($numero, $intentos){
            $this->numero = $numero;//hacemos referencia de los atributos de la clase
            $this->intentos = $intentos;
        }

        public function sortear(){
            $minimo = $this->numero / 5;//realizara un division entre el numero ingresado con el numero que le asignemos
            $maximo = $this->numero * 2;//realizara una multiplicacion con el numero ingresado y el numero que le asignemos 
            for ($i=0; $i < $this->intentos; $i++) { 
                $int = rand($minimo, $maximo); // genera numeros aleatorios en base a los parametros que le asignemos
                self::intentos($int);
            }
        }

        public function intentos($int){
            if($int == $this->numero){//si el numero generado aleatoriamente es igual al numero ingresado por el usuario
                echo $int." es igual  ".$this->numero."<br>";
                $this->resultado = true;
            }else{
                echo $int." no es igual ". $this->numero." <br>";
            }
        }

        public function __destruct(){
            if ($this->resultado) {
                echo "Felicidades  has ganado numero del sorteo ganador es ".$this->numero."<br>"."numero de intentos ".$this->intentos;
            }else{
                echo "Has perdido sigue participando";
            }
        }
    }
    //creamos un nuevo objeto de la clase 

    //como la clase tiene el metodo constructor nos pide que le asignemos un valor para los parametros que contenga el constructor 
    //en este caso el constructor tiene dos atributos $numero e $intentos 
    
    $loteria = new Loteria(5,6);
    //llamamos al metodo sortear
    $loteria->sortear();
    */
?>

<?php  
//MODIFICADORES DE ACCESO   
    /*
    ¿que son los modificadores de acceso?
        Son simples propiedades que podemos añadirles a nuestros métodos y atributos de nuestra clase, estas nos ayudaran con los 
        accesos y la extraccíon de métodos o a tributos.
    TIPOS 
        *Public
        Se puede realizar de todo con el atributo o el metodo
        *Private
        Un metodo privado solo puede ser llamado desde otro metodo de la clase. No podemos llamar a un metodo privado desde donde 
        definimos un objeto
        *Protected
        Un atributo o metodo protected puede ser accedido por la clase, por todas sus subclases pero no por los objetos que definimos 
        de dichas clases.
    */
    /*
    class Facebook{
        //atributos
        public $nombre;
        public $edad;
        private $pass;
        //metodos
        public function __construct($nombre, $edad, $pass){
            $this->nombre = $nombre;
            $this->edad = $edad;
            $this->pass = $pass;
        }

        public function verInformacion(){
            echo "Nombre: ".$this->nombre."<br>";
            echo "Edad: ".$this->edad."<br>";
            self::cambiarPass("4321");
            echo "Password: ".$this->pass;
        }

        private function cambiarPass($pass){
            $this->pass = $pass;
        }
    }

    $facebook = new Facebook("jose garcia","22","1234");
    $facebook->verInformacion();
    //no podemos acceder a los atributos private con el objeto de la clase solo podemos acceder a los atrubituos de tipo public
    /*echo $facebook->pass;*/
    //no podemos acceder a metodos de tipo private nos maracaria un error
    //solo podemos llamar al metodo private dentro de la misma clase 
    /*$facebook->cambiarPass("4321");*/
?>

<?php 
    //HERENCIA
    /*Que es la herencia?
        Significa que se pueden crear nuevas clases partiendo de clases existentes, que tendrán todos los atributos y los métodos de su 
        superclase o clase padre y ademas se le podrán añadir otros atributos y métodos propios.
    IMPORTANTE
        php no permite la herencia multiple.
    */
    /*
    class Vehiculo{
        //atributos
        public $motor = false;
        public $marca;
        public $color;
        //Metodos
        protected function estado(){//verifica si el motor esta encendido;
                if ($this->motor) {
                    echo "El motor esta encendido";
                }else{
                    echo "El motor esta apagado";
                }
        }

        public function encender(){
            if ($this->motor) {
                echo "Cuidado el motor ya esta encendiendo";
            }else{
                echo "El motor ahora esta encendido";
                $this->motor = true;
            }
        }
    } 
    //Creamos la clase moto y con la plabra reservada extends de php  indicamos que la clase moto hereda de la clase Vehiculo
    class Moto extends Vehiculo{
        /*los metodos de tipo protected pueden ser heredados pero no pueden ser utilizados directamente de la clase moto primero 
        //debemos crear un metodo de tipo publico para despues llamar al metodo estado de tipo protected y asi poder utilizarlo.
        
        //metodos
        public function estadoMoto(){
            self::estado();
        }
    }
    //creamos un objeto de la clase moto y como se podra ver no necesitamos tener atributos o metodos en la clase moto podemos utilizar 
    //los metodos y atributos de la clase Vehiculo
    $moto = new Moto();
    $moto->estadoMoto();
    $moto->encender();

    //creamos una clase llamada cuatrimoto que hereda de la clase moto pero a la vez hereda de la clase vehiculo
    //y podra utilizar todos sus atributos y metodos
    
    class Cuatrimoto extends Moto{

    }

    $cuatri = new Cuatrimoto();
    $cuatri->encender();
    */    
?>

<?php  
//static
    /*un metodo estatico pertenece a la clase pero no puede acceder a los atributos de una instancia. La caracteristica fundamental
    es que un metodo estatico se puede llamar sin tner que crear un objeto de dicha clase.

    Los metodos static pueden se heredados
    un metodo estatico no puede acceder a los atributos de la clase

    una propiedad declarada como static no puede ser accedida con un objeto de la clase instanciado (aun que un metodo estatico si lo puede
    hacer)
    */
    /*
    class Pagina{
        //atributos
        public $nombre = "Mi pagina web";
        public static $url = "www.mipaginaweb.com"; //atributo satatico 

        //metodos
        public function bienvenida(){
            echo "Bienvenidos  a".$this->nombre."<br>";
            echo "URL ".self::$url."<br>";//accediendo a un atributo estatico con la palabra reservada self::
            //otra forma de acceder a metodos o atributos estaticos 
            echo "URL".Pagina::$url;
        }
        //los metodos static no pueden acceder a los atributos de la clase
        public static function bienvenida2(){
            echo "Bienvenidos".self::$url;//los atributos de tipos static pueden ser accedidos dentro de un metodo static
        }
    }
    //$pagina = new Pagina();//objeto de la clase 
    //$pagina->bienvenida();

    //llamamos al metodo bienvenida2 de tipo static sin hacer un objeto de la clase
    Pagina::bienvenida2();
    */
?>

<?php 
    //interfaces
    /*las interfaces de objetos permiten crear código con el cual especificanos qué métodos deben ser 
    implementados por una clase.
    Las interfaces son definidas utlizando la palabra interface de la misma forma que con clase estandar
    pero sin metodos que tengan su contenido definido.
    Todos los métodos declarados en una interfaz deben ser públicos.
    Aplicación para automoviles donde se debera tener gasolina para poder encender el automovil, ademas este podra
    usarse pero gastara gasolina y una ves que su tanque este vacio se va ha apagar.
    */
    //dentro de la interfaz simpre debe definir los metodos de tipo public 
    interface Auto{//creamos una interface con el nombre auto
        //metodos
        public function encender();
        public function apagar();
    }
    //la interfaz gasolina hereda los metodos de la interfaz Auto
    interface gasolina extends Auto{
        public function vaciarTanque();
        public function llenarTanque($cant);
    }
    //la clase deportivo implementa los metodos de la interfaz gasolina 
    class Deportivo implements gasolina{
        //atributos
        private $estado = false;
        private $tanque = 0;
        //metodos
        public function estado(){
            if($this->estado){
                echo "El  estado del auto es encendido  y tiene ". $this->tanque ."<br>";
            }else{
                echo "el auto esta apagado por falta de gasolina. <br>";
            }
        }
        //para que los metodos de la clase Deportivo funcionen debe de tener los metodos declarados de ambas interfazes
        public function encender(){
            if ($this->estado) {
                echo "no puedes encender el auto dos veces <br>";
            }else{
                if ($this->tanque <= 0) {
                    echo "el carro no tiene gasolina <br>";
                }else{
                    echo "EL auto encendido <br>";
                    $this->estado = true;
                }
            }
        }
        public function apagar(){
            if ($this->estado) {
                echo "Auto apagado <br>";
                $this->estado = false;
            }else{
                echo "El auto ya esta apagado  <br>";
            }
        }
        public function vaciarTanque(){
            $this->tanque = 0;
        }
        public function llenarTanque($cant){
            $this->tanque = $cant;
        }

        public function usar($km){
            if ($this->estado) {
                $reducir = $km / 3;
                $this->tanque = $this->tanque - $reducir;
                if ($this->tanque <= 0) {
                    $this->estado = false;
                }
                }else{
                    echo "El auto esta apagado y no se pude usar <br>";
                }
        }
    }
    //creamos el objeto de la clase
    $obj = new Deportivo();
    $obj->llenarTanque(100);
    $obj->encender();
    $obj->usar(350);
    $obj->estado();
    







?>
