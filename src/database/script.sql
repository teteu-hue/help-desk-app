CREATE TABLE IF NOT EXISTS usuario(
    id_user INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name_user VARCHAR(20) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(20) NOT NULL
);

INSERT INTO
    usuario(name_user, email, senha)
VALUES
    ('admin', 'admin@admin.com', 'admin'),
    ('root', 'root@root.com', 'root');
    