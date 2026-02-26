ALTER TABLE proprietarios
ADD column qtd_hospedagens INT;

ALTER TABLE alugueis RENAME TO reservas;
USE insight_places;
ALTER TABLE reservas RENAME COLUMN aluguel_id TO reserva_id;