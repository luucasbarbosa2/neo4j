<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;

use GraphAware\Neo4j\Client\ClientBuilder;

/**
 * Description of DatabaseController
 *
 * @author lucasbarbosa
 */
class DatabaseController extends AppController {

    private $user = 'admin';
    private $password = "b.5br0AXcZSBFj.PJToLUVm5vMRSodw";
    private $connection = "bolt://hobby-ceihhdmkgedpgbkeimibbbbl.dbs.graphenedb.com:24786";
    private $client;
    
    
    public function __construct(\Cake\Http\ServerRequest $request = null, \Cake\Http\Response $response = null, $name = null, $eventManager = null, $components = null) {
        parent::__construct($request, $response, $name, $eventManager, $components);
        $this->client = $this->builder();
    }
    
    public function builder() {
        $this->disableAutoRender();
        $config = \GraphAware\Bolt\Configuration::newInstance()
                ->withCredentials($this->user, $this->password)
                ->withTimeout(10)
                ->withTLSMode(\GraphAware\Bolt\Configuration::TLSMODE_REQUIRED);
        $driver = \GraphAware\Bolt\GraphDatabase::driver($this->connection, $config);
        return $driver->session();
    }
    public function newId(){
        return uniqid(rand(rand( mt_rand(0, 0xffff), time()), rand()));
    }
    public function match($node, $find){
        return $this->client->run("MATCH (n:Person {name: 'Bob'}) RETURN  n");
    }
    
    public function query(){
        
    }
    
    public function create(){
        "MATCH (n:Person {name: 'Bob'}) RETURN  n(id)";
    }    

}
