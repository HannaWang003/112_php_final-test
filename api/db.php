<?php
date_default_timezone_set("Asia/Taipei");
session_start();
//2
function dd($ary){
    echo "<pre>";
    print_r($ary);
    echo "</pre>";
}
function to($url){
    header("location:{$url}");
}
class DB{
    //3 protected
    protected $table;
    protected $dsn="mysql:host=localhost;charset=utf8;dbname=db03";
    protected $pdo;
    //construct
    function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }
    //3 private
    private function a2s($ary){
        foreach($ary as $col=>$val){
            $tmp[]="`{$col}`='{$val}'";
        }
        return $tmp;
    }
    private function sql_all($sql,$where,$other){
        if(is_array($where)){
            $sql.=" where ".join(" && ",$this->a2s($where));
        }
        else{
            $sql.=" $where";
        }
        $sql.=" $other";
        return $sql;
    }
    private function math($math,$col,$where='',$other=''){
        $sql="select $math(`$col`) from `$this->table` ";
        $sql=$this->sql_all($sql,$where,$other);
        return $this->pdo->query($sql)->fetchColumn();
    }
    //9
    function all($where='',$other=''){
        $sql="select * from `$this->table` ";
        $sql=$this->sql_all($sql,$where,$other);
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); 
    }
    function count($where='',$other=''){
        $sql="select count(*) from `$this->table` ";
        $sql=$this->sql_all($sql,$where,$other);
        return $this->pdo->query($sql)->fetchColumn(); 
    }
    function sum($col,$where='',$other=''){
        return $this->math("sum",$col,$where,$other);
    }
    function max($col,$where='',$other=''){
        return $this->math("max",$col,$where,$other);
    }
    function min($col,$where='',$other=''){
        return $this->math("min",$col,$where,$other);
    }
    function save($ary){
        if(isset($ary['id'])){
            $sql="update `$this->table` set ";
            $sql.=join(",",$this->a2s($ary));
            $sql.=" where `id`=".$ary['id'];
        }
        else{
            $sql="insert into `$this->table` ";
            $col="(`".join("`,`",array_keys($ary))."`)";
            $val="('".join("','",$ary)."')";
            $sql.="{$col} values {$val}";
        }
        $this->pdo->exec($sql);
    }
    function find($id){
        $sql="select * from `$this->table` ";
        if(is_array($id)){
$sql.=" where ".join(" && ",$this->a2s($id));
        }
        elseif(is_numeric($id)){
            $sql.=" where `id`='{$id}'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    function del($id){
        $sql="delete from `$this->table` ";
        if(is_array($id)){
$sql.=" where ".join(" && ",$this->a2s($id));
        }
        elseif(is_numeric($id)){
            $sql.=" where `id`='{$id}'";
        }
        return $this->pdo->exec($sql);
    }
    function q($sql){
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

}
$Total=new DB('total');
$User=new DB('user');
$News=new DB('news');
$Que=new DB('que');
$Good=new DB('good');

if(!isset($_SESSION['visited'])){
    if($Total->count(['date'=>date("Y-m-d")])>0){
    $today = $Total->find(['date'=>date("Y-m-d")]);
    $today['total']++;
    $Total->save($today);
}
    else{
        $Total->save(['date'=>date("Y-m-d"),'total'=>1]);
    }
    $_SESSION['visited']=1;
}

    




?>