<?php
namespace App\Model;

use PhalApi\Model\NotORMModel as NotORM;

class Comments extends NotORM {

    protected function getTableName($id) {
        return 'comments';
    }

    public function getAll() {
        //获取label表的所有行
        $model = $this->getORM();
        $data = $model->select("*");
        return $data;
    }

    public function getById($id) {
        $model = $this->getORM();

        $data = $model->where("id",$id);
        $data = $data->fetchOne();
        return $data;
    }

    public function deleteById($id) {
        $model = $this->getORM();

        $data = $model->where("id",$id)->delete();
        return $data;
    }
    public function add($insert_data) {
        $model = $this->getORM();
        $id = $model->insert($insert_data);

        return $id;
    }

    public function updateById($id,$data) {
        $model = $this->getORM();

        return $model->where("id", $id)->update($data);
    }
    public function getTotalNum(){
        $model = $this->getORM();

        return $model->count("id");
    }
    public function getByQid($qid){
        $model = $this->getORM();

        return $model->where("qid", $qid);
    }
}