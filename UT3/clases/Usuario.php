<?php

class Usuario {

    protected $nombre;
    protected $apellidos;
    protected $deporte;
    protected $nivel;
    protected $historico = [];

    protected $historicoPart = 6;

    public function __construct(string $nombre, string $apellidos, string $deporte) {
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->deporte = $deporte;
        $this->nivel = 0;

        echo "Usuario creado ".$this->nombre."<br>";
    }

    public function introducirResultado(string $resultado) {
        // array_unshift añade valores al principio del array
        switch (strtolower($resultado)) {
            case 'victoria':
                array_unshift($this->historico, 'victoria');
                echo $this->nombre." gana partido<br>";
                break;
            case 'derrota':
                array_unshift($this->historico, 'derrota');
                echo $this->nombre." pierde partido<br>";
                break;
            case 'empate':
                array_unshift($this->historico, 'empate');
                echo $this->nombre." empata partido<br>";
                break;
        }

        // cogemos los 6 primeros elementos del array y los guardamos en una variable aux
        $resultadoPartidos = array_slice($this->historico, 0, $this->historicoPart);
        // quitamos los valores repetidos, si solo hay uno quiere decir ha ganado o perdido o empatado 6 veces seguidas
        $numResultados = count(array_unique($resultadoPartidos));

        // Comprobamos que de los resultado efectivamente se han jugado seis partidos y si ha ganano, perdido o empatado 6 veces seguidas para subirle o bajarle de nivel
        // es importante ver que se hayan jugado seis partido ya que al principio el primer valor sera el único y podría subit o bajar el nivel segun el valor dado
        if (count($resultadoPartidos) == $this->historicoPart && $numResultados == 1) {
            // guardamos en la variable la cadena para comparar y tomat acciones sobre ello
            $resultadoPartidos = array_unique($resultadoPartidos)[0];
            switch ($resultadoPartidos) {
                case 'victoria':
                    $this->nivel++;
                    echo $this->nombre." sube a nivel ".$this->nivel."<br>";
                    break;
                case 'derrota':
                    $this->nivel--;
                    echo $this->nombre." baja a nivel ".$this->nivel."<br>";
                    break;
            }
        }
    }

    public function imprimirInformacion() { 
        echo "Imprimir ".$this->nombre."<br>";
        $clase = substr(get_class($this), 7);
        $clase = (strlen($clase) != 0)?" ($clase)":'';
?>
    <div class="blue">
        <ul>
            <li>Nombre: <?= $this->nombre . $clase ?></li>
            <li>Apellidos: <?= $this->apellidos ?></li>
            <li>Deporte: <?= $this->deporte ?></li>
            <li>Nivel: <?= $this->nivel ?></li>
            <li>Historico: 
                <ul>
                <?php foreach (array_count_values($this->historico) as $key => $value) {
                    $key = ucfirst($key);
                    echo "<li>$key: $value</li>";
                } ?>
                </ul>    
            </li>
        </ul>
    </div>
<?php
    }
}
?>