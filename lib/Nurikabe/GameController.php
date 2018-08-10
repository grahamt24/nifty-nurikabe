<?php
/**
 * Created by PhpStorm.
 * User: Graham
 * Date: 6/4/2017
 * Time: 4:05 PM
 */

namespace Nurikabe;


class GameController
{
    private $nurikabe;
    private $post;
    private $game;
    private $solution;
    private $solved;
    private $verify_solve = false;
    private $verify_clear = false;
    private $solve = false;
    private $clear = false;
    private $check = false;

    public function __construct(Nurikabe $nurikabe, $post){
        $this->nurikabe = $nurikabe;
        $this->post = $post;
        $this->game = $this->nurikabe->getGameBoard();
        $this->solution = $this->nurikabe->getSolution();
        $this->check();
        if ($this->game[$this->nurikabe->getDifficulty()] == $this->solution[$this->nurikabe->getDifficulty()]) {
            $this->solved = true;
        }
        if ($this->solve == true) {
            $this->nurikabe->setGameBoard($this->solution);
            $this->solved = true;
        } elseif ($this->solve == false) {
            $this->nurikabe->setWantsToSolve(false);
        }
        if ($this->clear == true) {
            $this->clearBoard();
            $this->nurikabe->setWantsToClear(false);
        } elseif ($this->clear == false) {
            $this->nurikabe->setWantsToClear(false);
        }
        if ($this->check == true) {
            $this->checkGame();
        }
    }

    public function verifySolve(){
        return $this->verify_solve;
    }

    public function verifyClear(){
        return $this->verify_clear;
    }

    public function wantsToCheck(){
        return $this->check;
    }

    public function wantsToClear(){
        return $this->clear;
    }

    public function wantsToSolve(){
        return $this->solve;
    }

    public function solved(){
        return $this->solved;
    }


    public function check(){
        if(isset($this->post['cell'])){
            $difficulty = $this->nurikabe->getDifficulty();
            $cell = $this->post['cell'];
            $this->changeState($cell, $difficulty);
        }
        if(isset($this->post['solve'])){
            $this->removeErrors();
            $this->verify_solve = true;
        }
        if(isset($this->post['clear'])){
            $this->removeErrors();
            $this->verify_clear = true;
        }
        if(isset($this->post['check'])){
            $this->check = true;
        }
        if(isset($this->post['yes_solve'])){
            $this->solve = true;
        }
        if(isset($this->post['yes_clear'])){
            $this->clear = true;
        }
    }

    private function changeState($cell, $difficulty){
        if($this->game[$difficulty][$cell] == NURIKABE::BLANK){
            $this->game[$difficulty][$cell] = NURIKABE::SEA;
        }
        elseif($this->game[$difficulty][$cell] == NURIKABE::SEA || $this->game[$difficulty][$cell] == NURIKABE::SEAERROR){
            $this->game[$difficulty][$cell] = NURIKABE::ISLAND;
        }
        else{
            $this->game[$difficulty][$cell] = NURIKABE::BLANK;
        }
        $this->nurikabe->setGameBoard($this->game);
    }

    private function clearBoard(){
        $difficulty = $this->nurikabe->getDifficulty();
        foreach($this->game[$difficulty] as $key=>$value){
            if($this->game[$difficulty][$key] == NURIKABE::ISLAND || $this->game[$difficulty][$key] == NURIKABE::SEA
                || $this->game[$difficulty][$key] == NURIKABE::SEAERROR
                || $this->game[$difficulty][$key] == NURIKABE::ISLANDERROR ){
                $this->game[$difficulty][$key] = NURIKABE::BLANK;
            }
        }
        $this->nurikabe->setGameBoard($this->game);
    }

    private function checkGame(){
        $difficulty = $this->nurikabe->getDifficulty();
        foreach($this->game[$difficulty] as $key=>$value){
            if($this->game[$difficulty][$key] != $this->solution[$difficulty][$key]){
                if($this->game[$difficulty][$key] == NURIKABE::ISLAND){
                    $this->game[$difficulty][$key] = NURIKABE::ISLANDERROR;
                }
                elseif ($this->game[$difficulty][$key] == NURIKABE::SEA){
                    $this->game[$difficulty][$key] = NURIKABE::SEAERROR;
                }
            }
        }
        $this->nurikabe->setGameBoard($this->game);
    }

    private function removeErrors(){
        $difficulty = $this->nurikabe->getDifficulty();
        foreach($this->game[$difficulty] as $key=>$value){
            if($this->game[$difficulty][$key] == NURIKABE::SEAERROR){
                $this->game[$difficulty][$key] = NURIKABE::SEA;
            }
            elseif($this->game[$difficulty][$key] == NURIKABE::ISLANDERROR ){
                $this->game[$difficulty][$key] = NURIKABE::ISLAND;
            }
        }
        $this->nurikabe->setGameBoard($this->game);
    }
}