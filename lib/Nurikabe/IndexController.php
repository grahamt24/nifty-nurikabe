<?php
/**
 * Created by PhpStorm.
 * User: Graham
 * Date: 6/5/2017
 * Time: 2:28 PM
 */

namespace Nurikabe;


class IndexController
{
    public function __construct(Nurikabe $nurikabe, $post){
        $this->nurikabe = $nurikabe;
        $this->post = $post;
        $this->check();
    }

    public function errored(){
        return $this->error;
    }

    public function check(){
        if(!empty($this->post['name'])){
            $name = strip_tags($this->post['name']);
            $this->nurikabe->setName($name);
            if(isset($this->post['difficulty'])){
                $difficulty = $this->post['difficulty'];
                $this->nurikabe->setDifficulty($difficulty);
                if($difficulty == "3x3ultraeasy"){
                    $json = json_encode(array('diff'=>$difficulty, 'game'=>array(array(1,-1,1),
                        array(-1,-1,-1),array(2,-2,-1))));
                    $this->nurikabe->setJson($json);
                }
                elseif($difficulty == "8x8veryeasy"){
                    $json = json_encode(array('diff'=>$difficulty, 'game'=>array([-1,-1,2,-2,-1,-1,-1,-1],
                        [-1,1,-1,-1,-1,4,-2,-1], [-1,-1,-1,-2,2,-1,-2,-1],[-1,2,-2,-1,-1,-1,-2,-1],
                        [4,-1,-1,-1,-2,2,-1,-1],[-2,-1,-2,-1,-1,-1,-1,-2],[-2,-1,-2,3,-1,-2,-1,3],
                        [-2,-1,-1,-1,-2,3,-1,-2])));
                    $this->nurikabe->setJson($json);
                }
                elseif($difficulty == "10x10easy"){
                    $json = json_encode(array('diff'=>$difficulty, 'game'=>array([4,-2,-2,-2,-1,-1,-1,-1,-1,1],
                        [-1,-1,-1,-1,-1,-2,-2,-1,-2,-1], [-1,-2,-1,-2,-2,-1,3,-1,3,-1],[-1,2,-1,3,-1,-1,-1,-1,-2,-1],
                        [1,-1,-1,-1,4,-2,-1,3,-1,-1],[-1,-1,2,-2,-1,-2,-1,-2,-1,5],[-1,-2,-1,-1,-1,-2,-1,-2,-1,-2],
                        [-1,-2,-1,1,-1,-1,-1,-1,-1,-2], [-1,-2,4,-1,-1,3,-2,-2,-1,-2], [-1,-1,-1,-2,2,-1,-1,-1,-1,-2])));
                    $this->nurikabe->setJson($json);
                }
                elseif($difficulty == "8x8medium"){
                    $json = json_encode(array('diff'=>$difficulty, 'game'=>array([-2,-1,-1,-1,-1,-1,-1,-1],
                        [2, -1,-2,-2,-1,-2,-2,-2], [-1,4,-2,-1,-1,-1,-1,-2],[-1,-1,-1,-1,2,-2,-1,6],
                        [-1,-2,-1,2,-1,-1,-1,-2],[-1,2,-1,-2,-1,-2,-1,-1],[5,-1,-1,-1,4,-2,-2,-1],
                        [-2,-2,-2,-2,-1,-1,-1,-1])));
                    $this->nurikabe->setJson($json);
                }
            }
        }
        if(empty($this->post['name'])){
            $this->error = true;
        }
    }

}