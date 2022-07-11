<?php
    require_once (dirname(__FILE__).'/../QueryList/vendor/autoload.php');
    use QL\QueryList;

class qingyun_robot {

    public function getText($word){
        $text="404";
        $api="http://api.qingyunke.com/api.php?key=free&appid=0&msg=".$word;
        $html=QueryList::get($api)->getHtml();
        $json=json_decode($html);
        $result=$json->result;
        $content=$json->content;
        if ($result==0){
            $text=str_replace("{br}","\n",$content);
            return $text;
        }
        return $text;
    }
}
