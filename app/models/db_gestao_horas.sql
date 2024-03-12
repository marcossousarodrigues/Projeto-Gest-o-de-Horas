

CREATE TABLE tb_gestao_horas(
	id INT AUTO_INCREMENT PRIMARY KEY,
    projeto VARCHAR(255),
    data DATETIME,
    hora_inicio DATETIME,
    hora_saida DATETIME
);