declare function local:replacecdata ($cadena as xs:string)
as xs:string {
replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(replace(replace($cadena, "&amp;eacute;", "é"), "&amp;aacute;", "á"), "&amp;uacute;", "ú"), "&amp;oacute;", "ó"), "&amp;iacute;", "í"), "&amp;Aacute;","Á"),"&amp;Eacute;","É"),"&amp;Iacute;","Í"),"&amp;Oacute;","Ó"),"&amp;Uacute;","Ú"),"&amp;ntilde;","ñ"),"&amp;Ntilde;","Ñ"), "&amp;amp;","&amp;")
};

declare function local:sysdate () as xs:string {
  (: substring(string(current-date()),9,2)||"/"||substring(string(current-date()),6,2)||"/"||substring(string(current-date()),1,4) :)
    "20/07/2022"
};

let $doctype := "<!DOCTYPE html>"
return $doctype,
let $services := doc("agenda_v1_es_impares.xml")/serviceList/service
return 
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="stylesheet" href="./css/proyecto-xml.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
   integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
   crossorigin=""/>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon" />
    <title>Proyecto XML</title>
</head>
<body>
    <header id="header">
        <img src="./img/logo.png" alt="logo" id="logo" draggable="false" />
        <ul class="nav">
            <li>
                <svg id="exit" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="white" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
            </li>
            <li><a href="./index.html">Inicio</a></li>
            <li><a href="./inventario.html">Inventario</a></li>
            <li><a href="./historia.html">Historia</a></li>
            <li><a href="./consejos.html">Consejos</a></li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a class="current">Proyecto XML</a></li>
            <li><a href="./contacto.html">Contacto</a></li>
        </ul>
        <svg id="menu" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="white" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path></svg>
    </header>
    <div class="content-wrapper">
        <h1>Proyecto Integrador</h1>
        <div class="content-section query1">
          <h2>Categorias</h2>
          {
            for $categorias in $services/extradata/categorias/categoria/item[@name="Categoria"]
                let $idCategoria := $categorias/../item[@name="idCategoria"]
                let $subcategorias := $categorias/../subcategorias/subcategoria/item[@name="SubCategoria"]
            order by $categorias
            group by $categorias,$idCategoria
            return (
                <ul class="categoria">
                    <li>
                        <input type="checkbox" id="checkbox-{lower-case($categorias)}" />
                        <label for="checkbox-{lower-case($categorias)}">
                            <span  class="text__underline">{$categorias, $idCategoria}</span> 
                            (subcategorias: {count(distinct-values($subcategorias))})
                        </label>
                        <ul class="subcategorias">{
                            for $subcategoria in $subcategorias
                                let $contador := $subcategoria
                            order by $subcategoria
                            group by $subcategoria
                            return <li>{$subcategoria} (eventos: {count($contador)})</li>
                        }</ul>
                    </li>
                </ul>    
            )
          }
        </div>
        <div class="content-section query2">
        {
            for $categoria in $services/extradata/categorias/categoria/item[@name="Categoria"]  where $categoria = 'Música'
                let $edificios := (
                    for $edificios in $categoria/../../../../basicData/nombrert where $edificios="WiZink Center"
                    return $edificios
                )
            order by $categoria
            group by $categoria
            return (
                <h2>{$categoria}</h2>,
                    <table>{
                    for $edificio in $edificios 
                        let $fechas := $edificio/../../extradata/fechas/rango
                        let $direccion := (
                            for $direccion in $edificio/../../geoData/address
                            return (
                                if ($direccion/text() != '') then ($direccion/text()||","),
                                if ($direccion/../zipcode/text() != '') then ($direccion/../zipcode/text()||","),
                                if ($direccion/../subAdministrativeArea/text() != '') then ($direccion/../subAdministrativeArea/text()||","),
                                if ($direccion/../country/text() = 'Spain') then ("España")
                            )
                        )
                    order by $edificio
                    group by $edificio
                    return (
                        <tr>
                            <td colspan="2">
                            <h3>{
                                if ($edificio='') then "---" else 
                                <span class="text__underline">{
                                $edificio,
                                distinct-values($direccion)
                                }</span>                    
                            }</h3>
                            </td>
                        </tr>,
                            for $fecha in $fechas
                                let $nombre := $fecha/../../../basicData/title
                                let $web := $fecha/../../../basicData/web                
                            order by substring($fecha/inicio,6),substring($fecha/inicio,3,6),substring($fecha/inicio,1,3),$nombre
                            group by $nombre
                            return 
                            <tr>
                                <td><a href="{$web/text()}" target="_blank">{local:replacecdata($nombre)}</a></td>
                                <td class="tabla__fecha">{
                                    if ($fecha/inicio = $fecha/fin) then 
                                    (for $fechaInicio in $fecha/inicio/text() return <p>{$fechaInicio}</p>) else 
                                    (<p>{$fecha/inicio/text()||" - "||$fecha/fin/text()}</p>)
                                }</td>
                            </tr>
                    ),
                    <tr>
                        <td colspan="2">Conciertos totales en el {distinct-values($edificios)}: {count($edificios)}</td>
                    </tr>
                }</table>
            )
        }
        </div>
        
        <div class="content-section query3">
        {
            let $categorias := (
                    for $categoria in $services/extradata/categorias/categoria/item[@name='Categoria'] where $categoria='Eventos de ciudad'
                    return $categoria
                )
            let $subcategorias := (
                    for $subcategoria in $categorias/../subcategorias/subcategoria/item[@name='SubCategoria'] where $subcategoria = 'Arte'
                    return $subcategoria
                )
            return
            (    
                <h2>{distinct-values($categorias)}, {distinct-values($subcategorias)}</h2>
                ,
                for $subcategoria in $subcategorias
                    let $nombres := $subcategoria/../../../../../../basicData/title
                    let $web := $subcategoria/../../../../../../basicData/web/text()
                    let $imagen := $subcategoria/../../../../../../multimedia/media/url/text()
                return (
                <div class="image__wrapper">
                    <h3>{local:replacecdata($nombres/text())}</h3>
                    <a href="{$web}" target="_blank"><img src="{$imagen[1]}" class="main__img"/></a>
                </div>
                ) 
                ,
                <p>Total: {count($subcategorias)}</p>
            )
        }
        </div>
        
        <div class="content-section query4">{
            for $municipio in //subAdministrativeArea where $municipio = "Alcorcón"
                let $nombres := $municipio/../../basicData/title
            group by $municipio
            return (
                <h2>Eventos de {$municipio}</h2>,
                <table>{
                    for $nombre in $nombres
                    let $web := $nombre/../web
                    let $anio := $nombre/../../extradata/fechas/rango/substring(inicio,7,4)
                    return 
                    <tr>
                        <td><a href="{$web}" target="_blank">{local:replacecdata($nombre)}</a></td>
                        <td class="tabla__fecha">{$anio}</td>
                    </tr>
                }</table>
            )  
        }</div>
        
        <div class="content-section query5">
        {
            for $nombre in $services/basicData/name where $nombre='Camilo'
            return <h2>Mapa de los próximos concierto de {$nombre/text()}</h2>
        }
        <div id="map"></div>
        </div>
    </div>
    

    <footer id="footer">
        <p>FanPage by Jason</p>

        <div id="social">
            <a href="http://twitter.com/TeamCherryGames" target="_blank"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" class="svg-inline--fa fa-twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="white" d="M459.4 151.7c.325 4.548 .325 9.097 .325 13.65 0 138.7-105.6 298.6-298.6 298.6-59.45 0-114.7-17.22-161.1-47.11 8.447 .974 16.57 1.299 25.34 1.299 49.06 0 94.21-16.57 130.3-44.83-46.13-.975-84.79-31.19-98.11-72.77 6.498 .974 12.99 1.624 19.82 1.624 9.421 0 18.84-1.3 27.61-3.573-48.08-9.747-84.14-51.98-84.14-102.1v-1.299c13.97 7.797 30.21 12.67 47.43 13.32-28.26-18.84-46.78-51.01-46.78-87.39 0-19.49 5.197-37.36 14.29-52.95 51.65 63.67 129.3 105.3 216.4 109.8-1.624-7.797-2.599-15.92-2.599-24.04 0-57.83 46.78-104.9 104.9-104.9 30.21 0 57.5 12.67 76.67 33.14 23.72-4.548 46.46-13.32 66.6-25.34-7.798 24.37-24.37 44.83-46.13 57.83 21.12-2.273 41.58-8.122 60.43-16.24-14.29 20.79-32.16 39.31-52.63 54.25z"></path></svg></a>
            <a href="https://www.youtube.com/channel/UCZS2K8ZsUmujTuj3cNMyBSA" target="_blank"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="youtube" class="svg-inline--fa fa-youtube" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="white" d="M549.7 124.1c-6.281-23.65-24.79-42.28-48.28-48.6C458.8 64 288 64 288 64S117.2 64 74.63 75.49c-23.5 6.322-42 24.95-48.28 48.6-11.41 42.87-11.41 132.3-11.41 132.3s0 89.44 11.41 132.3c6.281 23.65 24.79 41.5 48.28 47.82C117.2 448 288 448 288 448s170.8 0 213.4-11.49c23.5-6.321 42-24.17 48.28-47.82 11.41-42.87 11.41-132.3 11.41-132.3s0-89.44-11.41-132.3zm-317.5 213.5V175.2l142.7 81.21-142.7 81.2z"></path></svg></a>
            <a href="https://www.facebook.com/teamcherrygames/" target="_blank"><svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" class="svg-inline--fa fa-facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="white" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.8 90.69 226.4 209.3 245V327.7h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.3 482.4 504 379.8 504 256z"></path></svg></a>
        </div>
    </footer>

    <script src="./js/main.js">//</script>
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
    integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
    crossorigin="">//</script>
    <script>
    {
        for $nombre in $services/basicData/name where $nombre='Camilo'
            let $fechas := (
                for $fechas in $nombre/../../extradata/fechas/rango/inicio/text() where 
                compare(substring(local:sysdate(),4,2),substring($fechas,4,2)) <= 0 
                and compare(substring(local:sysdate(),1,2),substring($fechas,1,2)) <= 0
                return $fechas
            )
            let $location := $nombre/../../geoData/latitude/text()||", "||$nombre/../../geoData/longitude/text()
        return (
        "let mapOptions = {
        center:["||$location||"],
        zoom:18
        }
        
        let map = new L.map('map' , mapOptions);
        
        let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
        map.addLayer(layer);
        
        let marker = new L.Marker([40.423859700000, -3.671842100000]);
        marker.addTo(map);
        marker = L.marker(["||$location||"]).addTo(map);
        marker.bindPopup('Próximo concierto de "||$nombre||" el día "||$fechas[1]||"').openPopup();"
        )    
    }
    </script>
</body>
</html>