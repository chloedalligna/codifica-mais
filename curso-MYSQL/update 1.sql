UPDATE hospedagens
SET ativo = 1
WHERE hospedagem_id IN ('1', '10', '100');

SELECT * FROM hospedagens;
