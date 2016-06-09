<?php

namespace Controllers;

class HomeController extends \Picon\Lib\Controller{

    public function pre_action(){
        $this->security->disable();
        parent::pre_action();
        $this->set(array(
                        "isLoggedIn"    =>  $this->security->isLoggedIn(),
                    ));
    }

    public function indexAction(){
        $this->layout = "";

    }

    public function searchAction(){
        if($this->route["method"] != "GET")
            throw new \Picon\Lib\HttpException(404);

        $keyword    =   isset($_GET["q"])  ? $_GET["q"]  : "";
        $date       =   isset($_GET["db"]) ? $_GET["db"] : "";
        $color      =   isset($_GET["c"])  ? $_GET["c"]  : "";

        $_stickers          =   new \Models\StickerModel();
        $searchedStikers    =   $_stickers->searchStickers($keyword);

        $this->set(array("stickers" => $searchedStikers));
    }

    public function signinAction(){
        if($this->route["method"] == "POST"){

        }
    }
}
