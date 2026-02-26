<?php

namespace app\Core;
abstract class DbModel extends Model
{

   abstract public function TableName(): string;

   abstract public function attributes(): array;

   public function save(){
      $tableName = $this->TableName();
      $attributes = $this->attributes();
      $param = array_map(fn($attri) => ":$attri", $attributes);
      $statement = self::prepare("INSERT INTO $tableName (".implode(','.$attributes).") VALUES(".implode(','.$param).")");
      foreach($attributes as $attribute){
         $statement->bindValue(":$attribute",$this->{$attribute});
      }
      $statement->execute();

      return true;
   }

   public static function prepare($sql){
      return Application::$app->db->pdo->prepare($sql);
   }

}