<?php

$ex = array(
array('id' => 111,
'nombre' => 'Carros',
'parentId' => ''),
array('id' => 1,
'nombre' => 'Computadoras',
'parentId' => ''),
array('id' => 2,
'nombre' => 'Rines',
'parentId' => 111),
array('id' => 3,
'nombre' => 'Perfil Bajo',
'parentId' => 2),
array('id' => 4,
'nombre' => 'Lujo',
'parentId' => 3),
array('id' => 5,
'nombre' => 'Repuestos',
'parentId' => 111),
array('id' => 6,
'nombre' => 'momo',
'parentId' => 4),
array('id' => 7,
'nombre' => 'Software',
'parentId' => 1),
array('id' => 8,
'nombre' => 'Motores',
'parentId' => 5),
array('id' => 9,
'nombre' => 'Juegos',
'parentId' => 7),
array('id' => 10,
'nombre' => 'Administrativos',
'parentId' => 7),
array('id' => 11,
'nombre' => 'Animales',
'parentId' => ''),
array('id' => 12,
'nombre' => 'Hardware',
'parentId' => 1),
array('id' => 13,
'nombre' => 'Perros',
'parentId' => 11),
array('id' => 14,
'nombre' => 'Gatos',
'parentId' => 11),
array('id' => 15,
'nombre' => 'Hogar',
'parentId' => ''),
array('id' => 16,
'nombre' => 'Estrategia',
'parentId' => 9),
array('id' => 17,
'nombre' => 'Rol',
'parentId' => 9),
);

function buildTree($data, $rootId=0)
{
  $tree = array('children' => array(),
        'root' => array()
        );
  foreach ($data as $ndx=>$node)
    {
      $id = $node['id'];
      /* Puede que exista el children creado si los hijos entran antes que el padre */
      $node['children'] = (isset($tree['children'][$id]))?$tree['children'][$id]['children']:array();

      $tree['children'][$id] = $node;

      if ($node['parentId'] == $rootId)
    $tree['root'][$id] = &$tree['children'][$id];
      else
    {
      $tree['children'][$node['parentId']]['children'][$id] = &$tree['children'][$id];
    }

    }
  return $tree;
}

$tree=buildTree($ex);
echo "<ul><li>";
imprimir($tree['root']);
echo "</li></ul>";
function imprimir($tree) {

foreach ($tree as $row) {
  
echo $row['nombre'];
if ( count( $row['children'] ) > 0 ) {
echo "<ul><li>";
imprimir( $row['children'] );
echo "</li></ul>";
}
echo "<br>";
}
echo "<br>";
}

