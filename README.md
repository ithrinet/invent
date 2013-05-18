invent
======

Para la mejor Parueba de la applicacion despues de instalar Los Vendrs y crear la base de datos y las tablas  con los comandos necesarios


instala los datos de parueba del Fixtures con el comanado :

php app/console doctrine:fixtures:load

Las relacion de las tablas hay qui arreglarlas desde Phpmyadmin
lla base de datos esta exportada en el derictorio SQL/

1-table ORDENADOR en la vista de relaciones
  empleado_id=>'event'.'empleado'.'id.| Ondelete =>'SET NULL' | update'cascade'


2-table IMPRESOR en la vista de relaciones
	empleado_id=>'event'.'empleado'.'id.| Ondelete =>'SET NULL' | update'cascade'

1-table MOVIL en la vista de relaciones
	empleado_id=>'event'.'empleado
