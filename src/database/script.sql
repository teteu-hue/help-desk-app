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

CREATE TABLE IF NOT EXISTS chamado (
    id_chamado INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    titulo VARCHAR(20) NOT NULL,
    categoria VARCHAR(30) NOT NULL,
    descricao TEXT NOT NULL,
    id_user INT NOT NULL,
    CONSTRAINT fk_usuario_chamado FOREIGN KEY (id_user)
    REFERENCES usuario(id_user)
    ON DELETE CASCADE
);