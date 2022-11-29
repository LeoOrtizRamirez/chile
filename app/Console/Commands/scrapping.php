<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

//Scrapping
//composer require fabpot/goutte
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

use App\Models\Contrato;

class scrapping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:scrapping {fecha_inicio} {fecha_fin}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Guardar información según ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $fecha_inicio = $this->argument('fecha_inicio');
        $fecha_fin = $this->argument('fecha_fin');

        $url = 'https://www.mercadopublico.cl/BuscarLicitacion/Home/Buscar/';

        //Obtener total de páginas
        $crawler = $this->getClient()->jsonRequest('POST', $url, [
            'idEstado' => '-1',
            'codigoRegion' => '-1',
            'idTipoLicitacion' => '-1',
            //'fecha_inicio' => $fecha_inicio,
            //'fecha_fin' => $fecha_fin,
            'fecha_inicio' => '2022-10-01',
            'fecha_fin' => '2022-10-01',
            'pagina' => 1,
        ]);
        $num_paginas = $crawler->filter(".margin-bottom-xs .n-result")->text();
        echo $num_paginas ."\n";
        $num_paginas = round(($num_paginas / 10) + 1);
        echo $num_paginas ."\n";
        //Fin total de páginas

        $pagina = 1;
        while ($pagina <= $num_paginas) {
            $crawler = $this->getClient()->jsonRequest('POST', $url, [
                'idEstado' => '-1',
                'codigoRegion' => '-1',
                'idTipoLicitacion' => '-1',
                'fecha_inicio' => '2022-10-01',
                'fecha_fin' => '2022-10-01',
                'pagina' => $pagina,
            ]);
            //Fin paginador 

            //1. Extraccion de informacion de encabezados.
            $dataEncabezado = array();
            $crawler->filter(".responsive-resultado")->each(function ($node) use (&$dataEncabezado) {
                //Filtrar datos
                //construccion id_licitacion
                $dato_buscado = array('ID Licitación:', '');
                $dato_remplazo = array('', '');
                $id_licit  = $this->textValidation($node->filter(".lic-bloq-header .id-licitacion"));
                $codigo_proceso = str_replace($dato_buscado, $dato_remplazo, $id_licit);
                //Fin construccion codigo_proceso
                $estado_proceso  = $this->textValidation($node->filter(".lic-block-body .col-md-12 a"));
                $objeto  = $this->textValidation($node->filter(".lic-block-body .col-md-12 p.text-weight-light"));
                $cuantia  = $this->textValidation($node->filter("div:nth-child(3) > div.monto-dis.col-md-4 span:last-child"));
                
                //Formato fecha_publicacion
                
                $fecha_publicacion  = $this->textValidation($node->filter("div.lic-block-body > div:nth-child(3) > div:nth-child(2) > span"));
                $date = str_replace('/', '-', $fecha_publicacion);
                $fecha_publicacion = date('Y-m-d', strtotime($date));
                //Fin
                //Formato fecha_cierre       
                $fecha_cierre  = $this->textValidation($node->filter("div > div.lic-block-body > div:nth-child(3) > div:nth-child(3) > span.highlight-text.text-weight-light"));
                $date = str_replace('/', '-', $fecha_cierre);
                $fecha_cierre = date('Y-m-d', strtotime($date));
                //Fin
                

                $entidad_contratante  = $this->textValidation($node->filter("div > div.lic-bloq-footer > div > div:nth-child(1) > p"));
                $cant_compras_efectuadas  = $this->textValidation($node->filter("div > div.lic-bloq-footer > div > div:nth-child(2) > span"));
                $cant_rec_no_oportuno  = $this->textValidation($node->filter("div > div.lic-bloq-footer > div > div:nth-child(3) > span"));
                $pie_licitacion  = $this->textValidation($node->filter("div > div.col-md-12.text-center.margin-top-md > em > small"));
                //construccion url detalle
                $dato_buscado = array("$.Busqueda.verFicha('", "')", 'http');
                $dato_remplazo = array('', '', 'https');

                $link  = $this->textValidation($node, 'div.lic-block-body > div:nth-child(1) > a', 'onclick');
                $link = str_replace($dato_buscado, $dato_remplazo, $link);

                //dd($codigo_proceso);
                //Fin construccion url detalle

                /* array_push($dataEncabezado, [
                        'codigo_proceso' => $codigo_proceso,
                        'estado_proceso' => $estado_proceso,
                        'titulo' => $titulo,
                        'objeto' => $objeto,
                        'cuantia' => $cuantia,
                        'fecha_publicacion' => $fecha_publicacion,
                        'fecha_cierre' => $fecha_cierre,
                        'entidad' => $entidad,
                        'cant_compras_efectuadas' => $cant_compras_efectuadas,
                        'cant_rec_no_oportuno' => $cant_rec_no_oportuno,
                        'pie_licitacion' => $pie_licitacion,
                        'link' => $link,
                    ]); */




                $model = new Contrato;
                $model->entidad_contratante = $entidad_contratante;
                $model->codigo_proceso = $codigo_proceso;
                $model->objeto = $objeto;

                $model->modalidad = "";
                $model->ubicacion = "";
                $model->link = $link;
                $model->random = $cuantia;
                $model->estado_agrupado = "";
                $model->unspsc = 0;
                $model->unspsc_adicionales = "";
                $model->numero_documentos = 0;
                $model->fecha_actualizacion_estado = now();
                $model->fecha_last_update_seguimiento = now();
                $model->fecha_publicacion = $fecha_publicacion;
                $model->fecha_vencimiento = $fecha_cierre;
                $model->estado_proceso = $estado_proceso;

                if($this->buscarContrato($model)){
                    echo "El contrato ya existe...\n";
                }else{
                    $model->save();
                    echo "Guardando...\n";
                    $this->guardarDetalle($model);
                }
                
            });
            /*
            foreach ($dataEncabezado as $model) {
                Encabezado::guardar('encabezado', $model);
            }
            */
            //Fin extraccion de informacion de encabezados.

            //2. Inicio extraccion de informacion de detalle.  

            //3. Inicio extraccion de enlaces
            /*
            $dataEnlaces = array();
            foreach ($dataDetallePrincipal as $camposDetalle) {
                //Filtrar informacion desde #DWNL_grdId 
                $crawlerEnlaces = $client->request('GET', $camposDetalle['adjuntos']);
                $crawlerEnlaces->filter("#DWNL_grdId tr:not(:first-child)")->each(function ($node) use (&$dataEnlaces, &$camposDetalle) {
                    //Filtrar datos
                    $Id_licitacion = $camposDetalle['Id_licitacion'];
                    $anexo = $node->filter("td:nth-child(2) span")->text();
                    $tipo = $node->filter("td:nth-child(3) span")->text();
                    $descripcion = $node->filter("td:nth-child(4) span")->text();
                    $peso = $node->filter("td:nth-child(5) span")->text();
                    //Formato fecha_adjunto
                    $fecha_adjunto = $node->filter("td:nth-child(6) span")->text();
                    $date = str_replace('/', '-', $fecha_adjunto);
                    $fecha_adjunto = date('Y-m-d', strtotime($date));
                    //Fin
                    $acciones = $node->filter("td:nth-child(7) input")->attr('title');

                    array_push($dataEnlaces, [
                        'Id_licitacion' => $Id_licitacion,
                        'anexo' => $anexo,
                        'tipo' => $tipo,
                        'descripcion' => $descripcion,
                        'peso' => $peso,
                        'fecha_adjunto' => $fecha_adjunto,
                        'acciones' => $acciones,
                    ]);
                });
                foreach ($dataEnlaces as $camposEnlaces) {
                    Enlaces::guardar('enlaces', $camposEnlaces);
                }
                //Fin extraccion de informacion de enlaces.
            }
            */
            $pagina++;
        }
        echo "Fin proceso...\n";
        //return redirect()->route('contratos')->with('info', 'Se realizó la búsqueda con éxito');
    }

    function buscarContrato($model){
        $contrato =  Contrato::where('link', $model->link)->first();
        if($contrato){
            return true;
        }else{
            return false;
        }
    }

    function guardarDetalle($model)
    {
        $crawlerDetalle = $this->getClient()->request('GET', $model->link);
        $model->modalidad = $this->textValidation($crawlerDetalle->filter('#lblFicha1Tipo'));
        $model->ubicacion = $this->textValidation($crawlerDetalle->filter('#lblFicha2Region'));
        $model->estado_proceso = $this->textValidation($crawlerDetalle->filter('#lblFicha1Estado'));
        
        $model->save();
    }

    public function getClient()
    {
        $client = HttpClient::create(array(
            'headers' => array(
                'Host' => 'www.mercadopublico.cl',
                'Content-Type' => 'application/json',
            ),
        ));
        return new Client($client);
    }

    function textValidation($node, $selector = "", $attr = null)
    {
        if ($selector == "") {
            if (is_null($attr)) {
                if ($node->count()) {
                    return $node->text();
                } else {
                    return "";
                }
            } else {
                if ($node->count()) {
                    if ($node->attr($attr) == "") {
                        return $node->attr("href");
                    }
                    return $node->attr($attr);
                } else {
                    return "";
                }
            }
        }

        if (!is_null($attr)) {
            if ($node->filter($selector)->count()) {
                return $node->filter($selector)->attr($attr);
            } else {
                return '';
            }
        }

        if ($node->filter($selector)->count()) {
            return $node->filter($selector)->text();
        } else {
            return '';
        }
    }
}
