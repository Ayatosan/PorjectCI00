<?php
// class Article extends My_Model {
  /**
   * Renvoie des données sur un article de blog
   */
  class Article extends MY_Model {

   public $article_id;
   public $article_name;
   public $article_body;
   public $article_modified;
   public $article_created;

   /*suppression de la function get_data*/
  // public function get_data(){
  // return array (
  // 'article_id'=> 45,
  // 'article_name' => 'Code Igniter est un framwork exeptionnnel',
  // 'article_body' => 'Il existe à l’heure actuelle beaucoup de Framework pour PHP. Les plus connus étant Symphony 2 (S2), Zend Framework 2 (ZF2), Cake PHP, Lavarel, Yii et CodeIgniter (CI). Certains ont déjà fait leurs preuves, d’autres des effets de mode et il y en a qui sont des usines à gaz.'
  //   );
  // }

  public function get_db_table(){
    return 'article';
  }
  public function get_db_table_pk(){
    return 'article_id';
  }


  public function save(){
  $this->article_modified = date ('Y-m-d H:i:s');

  return parent ::save();
  }
}
