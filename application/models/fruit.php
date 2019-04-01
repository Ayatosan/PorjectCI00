<?php
class Fruit extends CI_Model {

  public function get_datakiwi(){
    return array (
      'fruit_id' => 25,
      'fruit_name' => 'kiwi',
      'fruit_body' =>'Les kiwis sont des fruits de plusieurs espèces de lianes du genre Actinidia,
      famille des Actinidiaceae. Ils sont originaires de Chine1, notamment de la province de Shaanxi.
      On en trouve par ailleurs dans des climats dits montagnards tropicaux.
      En France, les kiwis de l\'Adour disposent d\'une IGP et d\'un label rouge.'
    );
  }
}
