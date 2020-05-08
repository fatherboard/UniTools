# Privilegios para `Usuario`@`localhost`

GRANT SELECT, INSERT, UPDATE, FILE ON *.* TO 'Usuario'@'localhost';

GRANT ALL PRIVILEGES ON `unitoolsdb`.* TO 'Usuario'@'localhost';


# Privilegios para `root`@`127.0.0.1`

GRANT ALL PRIVILEGES ON *.* TO 'root'@'127.0.0.1' WITH GRANT OPTION;


# Privilegios para `root`@`::1`

GRANT ALL PRIVILEGES ON *.* TO 'root'@'::1' WITH GRANT OPTION;


# Privilegios para `root`@`localhost`

GRANT ALL PRIVILEGES ON *.* TO 'root'@'localhost' WITH GRANT OPTION;

GRANT PROXY ON ''@'%' TO 'root'@'localhost' WITH GRANT OPTION;