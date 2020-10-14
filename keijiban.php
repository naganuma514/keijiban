<?php
class Usertext {
    
    private $user;

    public function Validation() {
        $err=[];
        $this->user=filter_input_array(INPUT_POST,[
            "view_name"=>FILTER_DEFAULT,
            "message"=>FILTER_DEFAULT,
        ]);
        
        foreach((array)$this->user as $key=>$value) {
            if($value==='') {
                $err[]=$this->checkText($key);
            } 
        }
        return $err;
    }
    public function checkText($key) {
        if($key==="view_name") {
            return "名前を入力して下さい";
        } elseif($key==="message") {
            return "コメントを入力してください";
        } 
    }
    public function getUserInfo()
    {
        $get = (object)$this->user;
        return $get;
    }
}