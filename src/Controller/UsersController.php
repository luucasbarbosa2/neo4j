<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controller;
//use App\Controller\DatabaseController;
/**
 * Description of UsersController
 *
 * @author lucasbarbosa
 */
class UsersController extends AppController{
    
    public function index(){
        
        $db = new DatabaseController();
        
        $result = $db->match();
        debug($result->getRecord()->value('n'));        
        
    }
    
}
